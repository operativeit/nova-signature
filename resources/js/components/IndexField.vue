<template>
  <span v-html="fieldValue"></span>
</template>

<script>
import signatureMixin from '../mixins';

export default {	
  props: ['resourceName', 'field'],

  computed: {
    fieldValue() {
      return this.isValidImgValue(this.field.value) ? this.__('Yes') : this.__('No');
    },
  }
}
</script>
