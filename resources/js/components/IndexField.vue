<template>
  <span v-html="fieldValue"></span>
</template>

<script>
import signatureMixin from '../mixins';

export default {	
  mixins: [ signatureMixin ],
  props: ['resourceName', 'field'],

  computed: {
    fieldValue() {
      return this.isValidImgValue(this.field.value) ? this.__('novaSignature.yes') : this.__('novaSignature.no');
    },
  }
}
</script>
