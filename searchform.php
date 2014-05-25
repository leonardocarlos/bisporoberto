
                    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>"> 
                            <div>
                                    <input type="text" value="<?php the_search_query(); ?>Digite sua busca..." name="s" id="s" onfocus="if ( this.value == this.defaultValue ) this.value = '';" onblur="if ( this.value == '' ) this.value = this.defaultValue"/> 
                                    <input type="submit" id="searchsubmit" value="ok" /> 
                            </div> 
                    </form>