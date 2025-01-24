import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import save from './save';

import './style.scss';

registerBlockType('ng1/inner-block', {
    edit: Edit,
    save,
});