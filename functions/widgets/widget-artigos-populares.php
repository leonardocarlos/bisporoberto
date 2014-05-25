<?php

/**
 * Widget de Sobre o Autor
 * 
 * @author Leonardo Carlos <leonardo@leoartes.com.br>
 * @link http://www.leoartes.com.br
 */
class ArtigosPopulares extends WP_Widget {
    
    /**
     * Construtor
     */
    public function ArtigosPopulares() {
        parent::WP_Widget(false, $name = 'Artigos Populares');
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
        echo $argumentos['before_title'] . $argumentos['widget_name'] . $argumentos['after_title'];
		echo "<ul id='artigos-populares'>";
		$pc = new WP_Query('orderby=comment_count&posts_per_page=5');
		while ($pc->have_posts()) : $pc->the_post();
			echo '<li><a href="' . get_permalink(). '" title="' . the_title('','',false) . '">' . the_title('','',false);
			comments_number(' [0]',' [1]',' [%]');
			echo '</a></li>';
		endwhile;
		echo '</ul>';
        
        /*if (isset($instancia['link_pagina']) && $instancia['link_pagina']) {
            echo '<iframe src="//www.facebook.com/plugins/likebox.php?href=' . str_replace(array('/', ':'),array('%2F', '%3A'),$instancia['link_pagina']) .'&amp;width=300&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;appId=112980195496066" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:258px;" allowTransparency="true"></iframe>';
        }*/
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
        $widget['qtde_artigos'] = $instancia['qtde_artigos'];
        ?>
        <p><label for="<?php echo $this->get_field_id('qtde_artigos'); ?>"><input id="<?php echo $this->get_field_id('qtde_artigos'); ?>" name="<?php echo $this->get_field_name('qtde_artigos'); ?>" type="text" value="<?php echo $widget['qtde_artigos'];?>"/> <br /><?php _e('Quantidade de artigos populares a serem exibidos'); ?></label></p>
        <?php    
    }
    
}
	register_widget('ArtigosPopulares');
?>
