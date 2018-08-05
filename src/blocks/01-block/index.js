/**
 * Block dependencies
 */
import icons from './icons';
import pluginData from '../../plugin-data';
import './style.scss';
import './editor.scss';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;


/**
 * Register block
 */
export default registerBlockType(
  pluginData.domain + '/' + pluginData.blockName01,
    {
      title: __('Title of the block', pluginData.domain ),
      description: __('Description for the side panel', pluginData.domain ),
        category: 'common',
        icon: {
          background: 'rgba(254, 243, 224, 0.52)',
          src: icons.default,
        },
        keywords: [
            __( 'Keyword 01', pluginData.domain ),
            __( 'Keyword 02', pluginData.domain ),
            __( 'Keyword 03', pluginData.domain ),
        ],
        edit: props => {
          const { className } = props;
          return (
            <div className={ className }>
            </div>
          );
        },
        save: props => {
          return (
            <div>
            </div>
          );
        },
    },
);
