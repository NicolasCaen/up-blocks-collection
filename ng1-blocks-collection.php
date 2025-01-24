<?php
/**
 * Plugin Name:       Ng1 Blocks Collection
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ng1-blocks-collection
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_ng1_blocks_collection_block_init() {
    // Chemin vers le dossier des blocs compilés
    $blocks_dir = __DIR__ . '/build/blocks';

    // Vérifier si le dossier existe
    if (!file_exists($blocks_dir)) {
        error_log('Le dossier des blocs n\'existe pas : ' . $blocks_dir);
        return;
    }

    // Parcourir tous les dossiers dans le dossier des blocs
    $block_folders = scandir($blocks_dir);
    foreach ($block_folders as $block_folder) {
        // Ignorer les dossiers spéciaux (. et ..)
        if ($block_folder === '.' || $block_folder === '..') {
            continue;
        }

        // Chemin complet du dossier du bloc
        $block_path = $blocks_dir . '/' . $block_folder;

        // Vérifier si c'est un dossier
        if (is_dir($block_path)) {
            // Enregistrer le bloc
            register_block_type($block_path);
            error_log('Bloc enregistré : ' . $block_folder);
        }
    }
}
add_action('init', 'create_block_ng1_blocks_collection_block_init');
