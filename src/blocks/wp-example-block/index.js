/**
 * Block dependencies
 *
 * Text Domain: wp-boilerplate
 */

import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import icons from './icons';
import pluginConsts from '../../plugin-consts';
import './style.scss';
import './editor.scss';

/**
 * Register block
 */
export default registerBlockType(
  `${pluginConsts.pluginName}/wp-example-block`,
  {
    title: __('Example Dynamic Block', 'wp-boilerplate'),
    description: __('Description for the side panel', 'wp-boilerplate'),
    category: 'common',
    icon: {
      background: '#2196F3',
      foreground: '#FFFFFF',
      src: icons.default,
    },
    keywords: [
      __('Keyword 01', 'wp-boilerplate'),
      __('Keyword 02', 'wp-boilerplate'),
      __('Keyword 03', 'wp-boilerplate'),
    ],
    edit: (props) => {
      const {className} = props;
      return <div className={className}>This is static block example.</div>;
    },
    save: (props) => {
      return null;
    },
  },
);
