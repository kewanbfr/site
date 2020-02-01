<?php
class Form{

    public $controller;
    public $errors;

    public function __construct($controller){
        $this->controller = $controller;
    }

    public function input($name, $label, $options=array()){
        $error = false;
        $classError = '';
        $alertInfos = '';

        if(isset($this->errors[$name])){
            $error = $this->errors[$name];
            //$classError = ' error';
            $classError = ' is-invalid';
            //$alertInfos = '<div class="invalid-feedback">'.$this->errors[$name].'</div>';
            $alertInfos = '<div class="invalid-feedback">'.$this->errors[$name].'</div>';

        }
        if(!isset($this->controller->request->data->$name)){
            $value = '';
        }else {
            $value = $this->controller->request->data->$name;
        }
        if($label == 'hidden'){
            return '<input type="hidden" name="'.$name.'" value="'.$value.'" >';
        }
        //$html = '< class="clearfix'.$classError.'">';
        //$html = $classErrorAlert;
        $html = '';
                    
                    $attr = '';
                    foreach ($options as $k => $v) {
                        $attr .= "$k=\"$v\"";
                    }
                    if(!isset($options['type'])){
                        $html .= '
                        <div class="form-group">
                        <label class="form-label" for="input'.$name.'">'.$label.'</label>
                        <div class="input">';
                        $html .= '<input class="form-control'.$classError.'" type="text" name="'.$name.'" id="input'.$name.'" value="'.$value.'" '.$attr.'>'.$alertInfos.'</div>';
                    }elseif($options['type'] == 'textarea'){
                        $html .= '<div class="form-group">
                        <label class="form-label" for="input'.$name.'">'.$label.'</label>
                        <div class="input">';
                        $html .= '<textarea class="form-control'.$classError.'" name="'.$name.'" id="input'.$name.'" '.$attr.'">'.$value.'</textarea>'.$alertInfos.'</div>';

                    }elseif($options['type'] == 'submit'){
                        $html .= '<div class="input"><button type="submit" '.$attr.'>'.$label.'</button>';
                    }elseif($options['type'] == 'checkbox'){
                        /*$html .= '<div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" name="'.$name.'" id="checkbox'.$name.'" value="'.$name.'">'.$label.'
                            </label>
                        </div>';*/

                        $html .= '
                        <div class="form-group form-check">
                        <label class="form-check-label'.$classError.'" for="'.$name.'">
                        <input type="hidden" name="'.$name.'"  value="0"><input class="form-check-input" '.$attr.' id="'.$name.'" class="form-check-label" type="checkbox" name="'.$name.'" id="checkbox'.$name.'" value="1" '.(empty($value)?'':'checked').'>'.$label.'
                        </label>
                        </div>';
                    }
                    //$html .= '</div></div>';
                    $html .= '</div>';
        return $html;
    }
}
?>