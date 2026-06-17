// @ts-check
import { defineConfig } from 'astro/config';
import mdx from '@astrojs/mdx';

// https://astro.build/config
export default defineConfig({
  site: 'https://cjnowacek.com',
  integrations: [mdx()],
  // Existing absolute asset URLs like /static/css/main.css are served from public/.
});
