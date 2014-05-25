<?php

/**
 * Widget de Sobre o Autor
 * 
 * @author Leonardo Carlos <leonardo@leoartes.com.br>
 * @link http://www.leoartes.com.br
 */
class CaixaRSS extends WP_Widget {
    
    /**
     * Construtor
     */
    public function CaixaRSS() {
        parent::WP_Widget(false, $name = 'Caixa para Cadastro no RSS Feed');
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
        
		if ($instancia['titulo_rss'] <> '')
        	echo $argumentos['before_title'] . $instancia['titulo_rss'] . $argumentos['after_title'];
        
        if (isset($opcoes_tema['wptuts_feedburner'])){
            echo '<img class="imgrss" src="http://www.escolasites.com/wp-content/themes/vectors/images/rss-icon.png" />
<h3 class="h3rss">' . $instancia['texto_rss'] . '</h3>
<form class="newsletter" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open(\'http://feedburner.google.com/fb/a/mailverify?uri=\'' . $opcoes_tema["wptuts_feedburner"] . '\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');return true">
<input style="display: initial;" id="input-rss" class="input-rss" type="text" name="email" placeholder="Insira seu email" />
<input type="hidden" value="' . $opcoes_tema["wptuts_feedburner"] . '" name="uri" /><input type="hidden" name="loc" value="pt_BR" />
<input id="btn-assinar" class="mais" style="width: 90px;margin-top: 1px;font-size: 15px;" type="submit" value=" ASSINAR " />
</form>';        }
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
        <p><label for="<?php echo $this->get_field_id('texto_rss'); ?>">
        	<textarea id="<?php echo $this->get_field_id('texto_rss'); ?>" cols="40" rows="3" name="<?php echo $this->get_field_name('texto_rss'); ?>"><?php echo $widget['texto_rss'];?></textarea> <br /><?php _e('Texto que aparecerá ao lado da imagem'); ?></label></p>
        <p><label for="<?php echo $this->get_field_id('titulo_rss'); ?>"><input id="<?php echo $this->get_field_id('titulo_rss'); ?>" name="<?php echo $this->get_field_name('titulo_rss'); ?>" type="text" value="<?php echo $widget['titulo_rss'];?>"/> <br /><?php _e('Título da Caixa'); ?></label></p>

        <?php    
    }
    
}
	register_widget('CaixaRSS');
?>
