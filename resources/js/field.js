import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'
import Vue3Signature from 'vue3-signature'

Nova.booting((Vue, store) => {
  Vue.use(Vue3Signature)
  Vue.component('index-nova-signature', IndexField)
  Vue.component('detail-nova-signature', DetailField)
  Vue.component('form-nova-signature', FormField)
})
