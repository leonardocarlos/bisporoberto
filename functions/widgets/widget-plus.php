<?php

/**
 * Widget de Sobre o Autor
 * 
 * @author Leonardo Carlos <leonardo@leoartes.com.br>
 * @link http://www.leoartes.com.br
 */
class CirclePlus extends WP_Widget {
    
    /**
     * Construtor
     */
    public function CirclePlus() {
    	
        parent::WP_Widget(false, $name = 'Fã Box Google Plus');
    }
    
    /**
     * Exibição final do Widget (já no sidebar)
     *
     * @param array $argumentos Argumentos passados para o widget
     * @param array $instancia Instância do widget
     */
    public function widget($argumentos, $instancia) {
	$opcoes_tema = wptuts_get_global_options();
        // Exibe o HTML do Widget
        echo $argumentos['before_widget'];
        echo $argumentos['before_title'] . $instancia['titulo_plus'] . $argumentos['after_title'];
        if (isset($opcoes_tema['wptuts_plus'])) {
            echo '<!-- Place this tag in the <head> of your document -->
<script type="text/javascript">
window.___gcfg = {lang: \'pt-br\'};
(function() 
{var po = document.createElement("script");
po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(po, s);
})();</script>

<!-- Place this tag where you want the badge to render -->
<g:plus href="https://plus.google.com/' . $opcoes_tema['wptuts_plus'] . '" rel="publisher" width="300" height="131" theme="light"></g:plus>';
        }
        echo $argumentos['after_widget'];
    }
    
    /**
     * Salva os dados do widget no banco de dados
     *
     * @param array $nova_instancia Os novos dados do widget (a serem salvos)
     * @param array $instancia_antiga Os dados antigos do widget
     * 
     * @return array $instancia Dados atualizados a serem salvos no banco de dados
     */
    public function update($nova_instancia, $instancia_antiga) {
        $instancia = array_merge($instancia_antiga, $nova_instancia);
        
        return $instancia;
    }
    
    /**
     * Formulário para os dados do widget (exibido no painel de controle)
     *
     * @param array $instancia Instância do widget
     */
    public function form($instancia) {
          $widget = $instancia;
        ?>
        <p><label for="<?php echo $this->get_field_id('titulo_plus'); ?>"><input id="<?php echo $this->get_field_id('titulo_plus'); ?>" name="<?php echo $this->get_field_name('titulo_plus'); ?>" type="text" value="<?php echo $widget['titulo_plus'];?>"/> <br /><?php _e('Título da Caixa'); ?></label></p>

        <?php    
    }
    
}
	register_widget('CirclePlus');
?>
