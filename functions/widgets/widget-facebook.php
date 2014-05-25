<?php

/**
 * Widget de Sobre o Autor
 * 
 * @author Leonardo Carlos <leonardo@leoartes.com.br>
 * @link http://www.leoartes.com.br
 */
class LikeBoxFacebook extends WP_Widget {
    
    /**
     * Construtor
     */
    public function LikeBoxFacebook() {
        parent::WP_Widget(false, $name = 'Like Box Facebook');
    }
    
    /**
     * Exibição final do Widget (já no sidebar)
     *
     * @param array $argumentos Argumentos passados para o widget
     * @param array $instancia Instância do widget
     */
    public function widget($argumentos, $instancia) {

        // Exibe o HTML do Widget
        echo $argumentos['before_widget'];
        echo $argumentos['before_title'] . $instancia['titulo_facebook'] . $argumentos['after_title'];
        
        if (isset($instancia['link_pagina']) && $instancia['link_pagina']) {
            echo '<iframe src="//www.facebook.com/plugins/likebox.php?href=' . str_replace(array('/', ':'),array('%2F', '%3A'),$instancia['link_pagina']) .'&amp;width=290&amp;height=280&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23fff&amp;stream=false&amp;header=false&amp;appId=112980195496066" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:290px; height:280px;" allowTransparency="true"></iframe>';
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
        <p><label for="<?php echo $this->get_field_id('link_pagina'); ?>"><input id="<?php echo $this->get_field_id('link_pagina'); ?>" name="<?php echo $this->get_field_name('link_pagina'); ?>" type="text" value="<?php echo $widget['link_pagina'];?>"/> <br /><?php _e('Link para sua página do Facebook'); ?></label></p>
        <p><label for="<?php echo $this->get_field_id('titulo_facebook'); ?>"><input id="<?php echo $this->get_field_id('titulo_facebook'); ?>" name="<?php echo $this->get_field_name('titulo_facebook'); ?>" type="text" value="<?php echo $widget['titulo_facebook'];?>"/> <br /><?php _e('Título da Caixa'); ?></label></p>

        <?php    
    }
    
}
	register_widget('LikeBoxFacebook');
?>
