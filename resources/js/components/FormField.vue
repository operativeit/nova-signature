<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
  <Vue3Signature :sigOption="{penColor: color, backgroundColor: bgColor}" :w="width" :h="height"
                 :disabled="disabled"  ref="signature" class="form-input-bordered rounded" @begin="onBegin" @end="onEnd" />

  <div class="flex flex-row align-middle md:items-center justify-center md:justify-end space-x-1 space-y-0 md:space-x-3 my-2">
  <button type="button"
          class="shadow bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm inline-block font-bold w-1/2 md:w-32 h-9 px-3"
          @click="undo">
          <component
            :is="`heroicons-outline-reply`"
            height="18"
            width="18"
            class="inline"
          /> {{__('novaSignature.undo') }}
  </button>
  <button type="button"
          class="shadow bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm inline-block font-bold w-1/2 md:w-32 h-9 px-3"
          @click="clear">
          <component
            :is="`heroicons-outline-x`"
            height="18"
            width="18"
            class="inline"
          /> {{__('novaSignature.clear') }}
  </button>
  </div>

      <textarea 
        :id="field.attribute"
        type="text"
        class="w-full hidden"
        v-model="value" rows="10"
      >
        {{value}}
      </textarea>

    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
  mixins: [FormField, HandlesValidationErrors],
  props: ['resourceName', 'resourceId', 'field'],
  data() {
      return {
          height: '300px',
          width: '100%',
          color: 'black',
          bgColor: 'white',
          disabled: false,
          format: 'image/png',
      }
  },

  beforeMount() {
        this.width = this.field.width || this.width;
        this.height = this.field.height || this.height;
        this.color = this.field.color || this.color;
        this.bgColor = this.field.bgColor || this.bgColor;
        this.format = this.field.format || this.format;
    },
  mounted() {
        this.$nextTick().then(() => {
            if (this.field.value) {
                this.value = this.field.value;
                this.$refs.signature.fromDataURL(this.value);
            }
        });
    },
  methods: {
    clear() {
        this.$refs.signature.clear()
    },

    undo() {
        this.$refs.signature.undo()
    },

    onBegin() {
    },

    onEnd() {
       this.save();
    },

    save() {
      if (this.$refs.signature.isEmpty()) {
        this.value = null;
      } else {
        console.log(this.format);
        this.value = this.$refs.signature.save(this.format);
      }
    },
   
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || '';
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.fieldAttribute, this.value || '')
    },
  },
}
</script>
