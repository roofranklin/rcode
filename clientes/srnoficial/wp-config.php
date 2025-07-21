<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'bd_srn' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'srnoficial' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'oioz2019' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'mysql380.umbler.com' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[n(q,_t%7Bl#f>qzxJ+Me@Ad/Cuno!MaSJ!kHL~M]f@!AMfU+|1N71bz-5QZ&PI]' );
define( 'SECURE_AUTH_KEY',  '};0tP:8O6LvBQwYTEh&ekajUq*]FUy%VGMn4U{>P&G<TBLJ,tf6|Re<v>lhS;3:q' );
define( 'LOGGED_IN_KEY',    'OO6Eb|QulnRtPSGwe3bgo;&p}14:NSw7~i TGj$%J[pj|?Sz@Fj5PIN|Ws7xtfzQ' );
define( 'NONCE_KEY',        '[+:@S.W{|L x)l9Wlk9Uk ZAAS/,X]3O32<,owLF,y]L:3Jd;0W9z~$B{1O-h$m?' );
define( 'AUTH_SALT',        '*zNd-&<LtUp6quX0P}pFr!B:=H@~[>E![<MdY[z3F>kW6:(DbebUiWq;quBC#R.n' );
define( 'SECURE_AUTH_SALT', '*JQonR %TT+)?o~q]D_=C]@?*ah5jeE`w1A3m9qq?0#z@<V*q~1zJm&( 0c8$<VD' );
define( 'LOGGED_IN_SALT',   '30WB@`asJJi;gC!t3 MI0M+mHF#43{D4|):g]iQfu$WIG[zLCgehi-qbhXgRdxtQ' );
define( 'NONCE_SALT',       'C_hI,e6?t2om;i 1H/HwwROcNQDYY~ui^If@Ond`>7)~1]=Mjzb2Wb]bS/3EfZk8' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
