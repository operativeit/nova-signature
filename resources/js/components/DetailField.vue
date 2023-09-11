<template>
  <PanelItem :index="index" :field="field">
      <template v-slot:value>
          <div v-if="isValidImgValue(field.value)">
              <img :src="field.value" class="img-responsive">
          </div>
          <p v-else>&mdash;</p>
      </template>
  </PanelItem>
</template>

<script>
import signatureMixin from '../mixins';

export default {
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
}
</script>
