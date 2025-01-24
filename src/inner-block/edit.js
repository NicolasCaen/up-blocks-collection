import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
    const blockProps = useBlockProps();
    const TEMPLATE = [
    [
        "core/heading",
        {
            "level": 2,
            "placeholder": "Titre de la section"
        }
    ],
    [
        "core/paragraph",
        {
            "placeholder": "Ajoutez du contenu ici..."
        }
    ],
    [
        "core/paragraph",
        {
            "placeholder": "Ajoutez du contenu ici..."
        }
    ]
];
    return (
        <div {...blockProps}>
            <InnerBlocks template={TEMPLATE} templateLock={false} />
        </div>
    );
}