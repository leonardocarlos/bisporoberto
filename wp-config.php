<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'blog_bra');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'user_bra');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'braimw');

/** nome do host do MySQL */
define('DB_HOST', 'mysql04.hstbr.net');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'u@FI*->TDpj10zF<&}G3M{Z7l6{1BfsDfA/r$GoRcxwvMU0MNV8SS6z/lE#f:JD|');
define('SECURE_AUTH_KEY',  'D55HLP*jccXE$bb%LSl#RtBI&%3:b1c6NH.{|uHS~4+s6j!Yv&P42HbOqtg-mqPm');
define('LOGGED_IN_KEY',    '=K.l|ZT~:!Lth3|!:;V]lMYxN}>)|OkyA/K( ]ZpcL{C>*DR#hN[Ec||.[#aMMTq');
define('NONCE_KEY',        '!U6|r{r<-{ll/k0E~r7!/p+}|e0U+,9y*#rAH?B|W-]=4ur|lL_Z$-ATjSYs7x8j');
define('AUTH_SALT',        'fmz6~[5.X+*V,RljyjCAau6Ah[Wa`6ibC+)|?Ox<f/Bk-/lZIee`m?{-xxL*nv][');
define('SECURE_AUTH_SALT', 'Z#+T-|oYt%dZZSr(yj39XeCLFS}.F{??3f-6e8C,HL85srzIIC7|y-(-8%Ra(W5+');
define('LOGGED_IN_SALT',   'i)_rM|w`|Nj[ <&DK.:xO&06#e8Jn9{P/G<|}Cc /L`tqJnVec&n|%$mZf1X=63j');
define('NONCE_SALT',       'pHV2Wyu-HC>6oRin*Cma?XT(I:3 1psa+n68V}PPlal`n:Vu`qF+D[8Gh7_3?N{^');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
