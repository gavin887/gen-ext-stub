<?php
$executor = getenv('_');

if ($argc == 1) {
    echo "Usage:", PHP_EOL;
    echo "    {$executor} -f ", basename($argv[0]), " <ext-name>", PHP_EOL;
    exit(2);
}

class ExtConstant
{
    public string $name = '';
    public string $type = '';
    public string $value = '';

    public function __construct(string $name, string $type, string $value)
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    public function toCode()
    {
        return "const {$this->name} = {$this->typeOfValue()};";
    }

    protected function typeOfValue()
    {
        switch ($this->type) {
            case 'string':
                return "\"{$this->value}\"";
            case 'int':
            case 'float':
                return strval($this->value);
            case 'bool':
                return strtolower($this->value) == 'true' ? "true" : "false";
            default:
                return "null";
                break;
        }
    }
}

class ExtFunction
{
    protected string $name = '';
    protected ?string $return = null;
    /** @var ExtParameter[] */
    protected array $parameters = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addParameters($name, $type, $required = true)
    {
        $this->parameters[] = new ExtParameter($name, $type, $required);
    }

    public function toCode()
    {
        $params = [];
        foreach ($this->parameters as $parameter) {
            $params[] = $parameter->toCode();
        }
        $params = implode(", ", $params);

        return "function {$this->name}({$params}) {\n}\n\n";
    }
}

class ExtParameter
{
    protected string $name;
    protected string $type;
    protected bool $required;

    public function __construct(string $name, string $type, bool $required = true)
    {
        $this->name = $name;
        $this->type = $type;
        $this->required = $required;
    }

    public function toCode()
    {
        $returns = "{$this->name}";
        if (! empty($this->type)) {
            if (stripos($this->type, ' or NULL') > 0) {
                $type = explode(' or ', $this->type)[0];
                $returns = "?{$type} {$returns}";
            } else {
                $returns = "{$this->type} {$returns}";
            }
        }
        if (! $this->required && stripos($this->name, '...') < 0) {
            $returns .= " = null";
        }
        return $returns;
    }
}


class ExtClassMethod
{
    protected string $policy;
    protected string $name;
    protected array $parameters = [];
    protected bool $final = false;
    protected bool $static = false;
    protected bool $abstract = false;
    protected ?string $return = null;
    protected string $entityType = 'class';

    public function __construct(string $policy, string $name, bool $static = false, bool $final = false)
    {
        $this->name = $name;
        $this->policy = $policy;
        $this->static = $static;
        $this->final = $final;
    }
    public function addParameters($name, $type, $required = true)
    {
        $this->parameters[] = new ExtParameter($name, $type, $required);
    }
    public function setReturn(?string $return): void
    {
        $this->return = $return;
    }
    public function setAbstract(bool $abstract): void
    {
        $this->abstract = $abstract;
    }

    public function setEntityType(string $entityType): void
    {
        $this->entityType = $entityType;
    }

    public function toCode()
    {
        $parameters = [];
        array_map(function (ExtParameter $item) use (&$parameters) {
            $parameters[] = $item->toCode();
        }, $this->parameters);

        $final = $this->final ? 'final ' : '';
        $abstract = $this->abstract ? ' abstract' : '';
        $static = $this->static ? ' static' : '';
        if (!empty($this->return)) {
            if (stripos($this->return, ' or NULL') > 0) {
                $type = explode(' or ', $this->return)[0];
                $this->return = ": ?{$type}";
            } else {
                if (stripos($this->return, '\\') > 0) {
                    $this->return = "\\" . $this->return;
                }
                $this->return = ": {$this->return}";
            }
        }
        $funcBody = "{\n    }";
        if ($this->abstract) {
            $funcBody =  ";";
            if ($this->entityType != 'class') {
                $abstract = '';
            }
        }
        return "{$final}{$this->policy}{$abstract}{$static} function {$this->name}(" . implode(', ', $parameters) . "){$this->return} {$funcBody}\n";
    }
}

class ExtClassProperty
{
    protected string $policy;
    protected bool $static;
    protected string $name;

    public function __construct(string $policy, string $name, bool $static)
    {
        $this->policy = $policy;
        $this->static = $static;
        $this->name = $name;
    }

    public function toCode()
    {
        $static = $this->static ? ' static' : '';

        return "{$this->policy}{$static} {$this->name};\n";
    }

}

class ExtClassConstants
{
    protected string $policy;
    protected string $name;
    protected string $type;
    protected string $value;

    public function __construct(string $policy, string $name, string $type, string $value)
    {
        $this->policy = $policy;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    public function toCode()
    {
        switch ($this->type) {
            case 'int':
            case 'float':
                $value = $this->value;
                break;
            case 'string':
                $value = "\"{$this->value}\"";
                break;
            case 'bool':
                $value = $this->value ? 'true' : 'false';
                break;
            default:
                $value = null;
                break;
        }

        return "{$this->policy} const {$this->name} = {$value};\n";
    }
}

class ExtClass
{
    protected bool $final;
    protected bool $abstract;
    protected string $entityType = 'class';
    protected string $name;
    protected string $extends;
    protected string $implements;

    /** @var ExtConstant[] */
    protected array $constants = [];
    /** @var ExtClassProperty[] */
    protected array $properties = [];
    /** @var ExtClassMethod[] */
    protected array $methods = [];

    public function __construct(string $name, string $extends = '', string $implements = '', bool $final = false, bool $abstract = false)
    {
        $this->name = $name;
        $this->extends = $extends;
        $this->implements = $implements;
        $this->final = $final;
        $this->abstract = $abstract;
    }

    public function addConstants(string $policy, string $name, string $type, $value)
    {
        $this->constants[] = new ExtClassConstants($policy, $name, $type, $value);
    }

    public function addProperty(string $policy, string $name, bool $static = false)
    {
        $this->properties[] = new ExtClassProperty($policy, $name, $static);
    }

    public function addMethods(ExtClassMethod $classMethod)
    {
        $this->methods[] = $classMethod;
    }

    public function setEntityType(string $entityType): void
    {
        $this->entityType = $entityType;
    }

    public function toCode()
    {
        $constants = [];
        array_map(function (ExtClassConstants $item) use (&$constants) {
            $constants[] = $item->toCode();
        }, $this->constants);

        $properties = [];
        array_map(function (ExtClassProperty $item) use (&$properties) {
            $properties[] = $item->toCode();
        }, $this->properties);

        $methods = [];
        array_map(function (ExtClassMethod $item) use (&$methods) {
            $methods[] = $item->toCode();
        }, $this->methods);

        $temp1 = [];
        $implements = explode(', ', $this->implements);
        if (is_array($implements)) {
            foreach ($implements as $implement) {
                if (interface_exists('\\' . $implement)) {
                    $temp1[] = '\\' . $implement;
                } else {
                    $temp1[] = $implement;
                }
            }
            $this->implements = implode(', ', $temp1);
        }


        $final = $this->final ? 'final ' : '';
        $abstract = $this->abstract ? 'abstract ' : '';
        $extends = ! empty($this->extends) ? " extends \\{$this->extends}" : '';
        $implements = ! empty($this->implements) ? " implements {$this->implements}" : '';

        $constants = implode("\n    ", $constants);
        $properties = implode("\n    ", $properties);
        $methods = implode("\n    ", $methods);

        return <<<CLASS
{$final}{$abstract}{$this->entityType} {$this->name}{$extends}{$implements} {

    {$constants}
    {$properties}
    {$methods}
}
CLASS;
    }

    public function save(string $directory)
    {
        $normalPath = str_replace('\\', '/', $this->name);

        $first = explode('/', $normalPath)[0];
        $basename = basename($normalPath);

        $storageFile = str_replace($first, $directory, $normalPath) . '.php';
        if (! file_exists(dirname($storageFile))) {
            mkdir(dirname($storageFile), 0777, true);
        }

        $namespace = '';
        if (stripos($normalPath, '/') > 0) {
            $namespace = "namespace " . str_replace('/', '\\', dirname($normalPath)) . ";";
        }

        $this->name = $basename;
        $content = "<?php\n\n{$namespace}\n\n" . $this->toCode();
        file_put_contents($storageFile, $content);
    }
}


$ext_name = trim($argv[1]);
if (! extension_loaded($ext_name)) {
    echo "Extension \"{$ext_name}\" not loaded！", PHP_EOL;
    exit(3);
}
$ext_info = shell_exec("{$executor} --re {$ext_name}");

$constants = [];
# region parse Constants
$constantsRegex = '/Constant\s+\[\s+(?<type>\w+)\s+(?<name>[^ ]+)\s+\]\s+\{\s+(?<value>[^ ]+)\s+\}/';
$nConstants = preg_match_all($constantsRegex, $ext_info, $matches, PREG_SET_ORDER);
echo "Found {$nConstants} constants...", PHP_EOL;
if ($nConstants > 0) {
    for ($i = 0; $i < $nConstants; $i++) {
        $item = $matches[$i];
        $constants[$item['name']] = new ExtConstant($item['name'], $item['type'], $item['value']);
    }
}
# endregion

$functions = [];
# region parse Functions
$functionsRegex = '/(?:\n\ \ \ \ )(Function|Method)\s+\[\s+<((?!deprecated)[^>])+>\s+(function|public\smethod)\s+(?<name>[^ ]+)\s+\]\s+\{\s+-\s+Parameters\s+\[(?<narg>\d+)\]\s+\{(?<argBody>[^}]+)\}((?!Return)[\s\S])+(\-\sReturn\s\[\s(?<return>[^ ]+)\s\]\s+)?[ ]{4}\}/';
$nFunctions = preg_match_all($functionsRegex, $ext_info, $funcMatches, PREG_SET_ORDER);
echo "Found {$nFunctions} functions...", PHP_EOL;
if ($nFunctions > 0) {
    for ($i = 0; $i < $nFunctions; $i++) {
        $item = $funcMatches[$i];
        list('name' => $name, 'narg' => $narg, 'argBody' => $argBody) = $item;
        $extFunction = new ExtFunction($name);
        if ($narg == 0) {
            $functions[$name] = $extFunction;
            continue;
        }

        $argRegex = '/Parameter\s+#\d+\s+\[\s+<(?<isRequired>required|optional)>\s+(?<type>([^ ]+)( or NULL)?)?\s*(?<combine>\.\.\.)?(?<argName>[\&\$a-z\d_]+)\s+\]/U';
        $nnarg = preg_match_all($argRegex, $argBody, $argMatches, PREG_SET_ORDER);
        for ($j = 0; $j < $nnarg; $j++) {
            list('isRequired' => $isRequired, 'type' => $type, 'combine' => $combine, 'argName' => $argName) = $argMatches[$j];
            $extFunction->addParameters($combine . $argName, $type, $isRequired == 'required');
        }
        $functions[$name] = $extFunction;
    }
}
# endregion

$classes = [];
# region parse Classes
$flag = 'Class [ <internal:';
$parts = explode($flag, str_replace('Interface [ <internal', 'Class [ <internal', $ext_info));
array_shift($parts);
echo "Found " . count($parts) . " classes...", PHP_EOL;
foreach ($parts as $part) {
    $classBody = $flag . $part;
    $classRegex = '/Class\s\[\s<[^>]+>(\s<[^>]+>)?(?<final>\sfinal)?(?<abstract>\sabstract)?\s(?<entityType>class|interface)\s(?<class>[^ ]+)(\sextends\s(?<extends>[^\]]+))?(\simplements\s(?<implements>[^\]]+))?\s\]/U';
    $nClass = preg_match_all($classRegex, $classBody, $classMatches, PREG_SET_ORDER);
    for ($i = 0; $i < $nClass; $i++) {
        $item = $classMatches[$i];
        $class = $item['class'];
        $extends = $item['extends'] ?? '';
        $implements = $item['implements'] ?? '';
        $final = trim($item['final']) == 'final';
        $abstract = trim($item['abstract']) == 'abstract';
        $extClass = new ExtClass($class, $extends, $implements, $final, $abstract);
        if ($item['entityType'] == 'interface') {
            $extClass->setEntityType($item['entityType']);
        }

        # region Constants of ExtClass
        $constRegex = '/[ ]{8}Constant\s+\[\s+(?<policy>[^ ]+)\s+(?<type>[^ ]+)\s+(?<name>[^ ]+)\s+\]\s+\{\ (?<value>[^ ]+)\ \}/U';
        $nConst = preg_match_all($constRegex, $classBody, $constMatches, PREG_SET_ORDER);
        echo "Found {$nConst} constants of {$class}...", PHP_EOL;
        for ($j = 0; $j < $nConst; $j++) {
            $jItem = $constMatches[$j];
            $extClass->addConstants($jItem['policy'], $jItem['name'], $jItem['type'], $jItem['value']);
        }
        # endregion

        # region Properties of ExtClass
        $propRegex = '/[ ]{8}Property\s+\[\s+<[^>]+>\s+(?<policy>[^ ]+)\s+(?<name>[^ ]+)\s+\]/U';
        $nProp = preg_match_all($propRegex, $classBody, $propMatches, PREG_SET_ORDER);
        echo "Found {$nProp} properties of {$class}...", PHP_EOL;
        for ($j = 0; $j < $nProp; $j++) {
            $jItem = $propMatches[$j];
            $extClass->addProperty($jItem['policy'], $jItem['name'], false);
        }
        # endregion

        # region Methods of ExtClass
        $part1 = '[ ]{8}Method\s+\[\s+<[^>]+>(?<abstract> abstract)?(?<static> static)?(?<final> final)?\s+(?<policy>[^ ]+)\s+method\s+(?<name>[^ ]+)\s+\]';
        $methodRegex = "/{$part1}\s+\{(?<margBody>[^}]+[\ ]{10}\}[\s\S]+(\-\ Return\ \[\ (?<return>[^ ]+)\ \]\s+)?[ ]{8}\})/U";
        $nMethods = preg_match_all($methodRegex, $classBody, $methodMatches, PREG_SET_ORDER);
        echo "Found {$nMethods} methods of {$class}...", PHP_EOL;
        for ($j = 0; $j < $nMethods; $j++) {
            $jItem = $methodMatches[$j];
            $static = trim($jItem['static']) == 'static';
            $final = trim($jItem['final']) == 'final';
            $abstract = trim($jItem['abstract']) == 'abstract';
            $return = isset($jItem['return']) ? $jItem['return'] : '';

            list('policy' => $policy, 'name' => $name, 'margBody' => $margBody) = $jItem;
            $classMethod = new ExtClassMethod($policy, $name, $static, $final, );
            $classMethod->setReturn($return);
            $classMethod->setAbstract($abstract);
            if ($item['entityType'] == 'interface') {
                $classMethod->setEntityType($item['entityType']);
            }

            //  parameter of method
            $margRegex = '/Parameter\s+#\d+\s+\[\s+<(?<isRequired>required|optional)>\s+(?<type>(array|callable)( or NULL)?)?\s*(?<combine>\.\.\.)?(?<argName>[\&\$a-z\d_]+)\s+\]/U';
            $nmnarg = preg_match_all($margRegex, $margBody, $margMatches, PREG_SET_ORDER);
            for ($k = 0; $k < $nmnarg; $k++) {
                list('isRequired' => $isRequired, 'type' => $type, 'combine' => $combine, 'argName' => $argName) = $margMatches[$k];
                $classMethod->addParameters($combine . $argName, $type, $isRequired == 'required');
            }

            $extClass->addMethods($classMethod);
        }
        # endregion
        $classes[] = $extClass;
    }
}
# endregion

# region dump to file
$dirname = basename("./{$ext_name}");
if (! file_exists($dirname)) {
    mkdir($dirname, 0777, true);
}
if (! file_exists($dirname)) {
    die("Cannot create stub directory: {$dirname}！");
}

foreach ($classes as $class) {
    $class->save($dirname);
}

$fh = fopen("{$dirname}/Constants.php", "w");
fputs($fh, "<?php\n\n");
foreach ($constants as $constant) {
    $content = $constant->toCode() . PHP_EOL;
    fputs($fh, $content, strlen($content));
}
fclose($fh);


$fh = fopen("{$dirname}/Functions.php", "w");
fputs($fh, "<?php\n\n");
foreach ($functions as $function) {
    $content = $function->toCode();
    fputs($fh, $content, strlen($content));
}
fclose($fh);
# endregion