<template>
  <div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
      <div class="page-hero page-container" id="page-hero">
        <div class="padding d-flex">
          <div class="page-title">
            <h2 class="text-md text-highlight">Template</h2>
            <small class="text-muted">Create your ashtonishing template.</small>
          </div>
          <div class="flex"></div>
        </div>
      </div>
      <div class="page-content page-container" id="page-content">
        <div class="padding">
          <div class="form-group">
            <label>Template name</label>
            <div class="row">
              <div class="col-md-4">
                <input
                  v-model="template_name"
                  type="text"
                  class="form-control"
                  width="50%"
                  placeholder="Template name..."
                />
              </div>
            </div>
          </div>

          <!-- CKEditor -->
          <div id="toolbar-container"></div>

          <div class="document-editor">
            <div class="document-editor__toolbar"></div>
            <div class="document-editor__editable-container">
              <div v-html="content" @blur="onInput" id="doc_editor" class="document-editor__editable">
                
              </div>
            </div>
          </div>

          <div v-if="template_name && content" class="form-group mt-3">
            <button @click="create_template" id="publish" class="btn btn-rounded btn-primary">Publish</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ############ Main END-->
  </div>
</template>

<script>
import axios from "axios";
import Editor from "@tinymce/tinymce-vue";

export default {
  data() {
    return {
      template_name: "",
      content: "",
      editor: "",
    };
  },
  methods: {
    create_template() {
      $("#publish").html("Publish..."); 
      axios({
        method: "post",
        url: "api/templates",
        data: {
          template_name: this.template_name,
          content: this.content,
          id: localStorage.getItem('id')
        }
      })
        .then(response => {        
          if(!response.data.status) {
            alert(response.data.message)          
          }else{
            alert(response.data.message);
            this.$router.push({ name: "template_collections" });
          }
        })
        .catch(error => {
          console.log(error);          
        })
        .finally(response => {
          $("#publish").html("Publish");
        });
    },
    onInput(teks) {
      this.$forceUpdate()
      this.content = teks.target.innerHTML
    }
  },
  components: {
    editor: Editor
  },
  created() {},
  mounted() {
    if(localStorage.getItem('reloaded')){
      localStorage.removeItem('reloaded')
    }else{
      localStorage.setItem('reloaded', '1')
      this.$router.go()
    }
  }
};
</script>

<style>
.ck-editor__editable, .document-editor__editable {
  min-height: 400px;
}

.document-editor {
    border: 1px solid var(--ck-color-base-border);
    border-radius: var(--ck-border-radius);

    /* Set vertical boundaries for the document editor. */
    max-height: 700px;

    /* This element is a flex container for easier rendering. */
    display: flex;
    flex-flow: column nowrap;
}
.document-editor__toolbar {
    /* Make sure the toolbar container is always above the editable. */
    z-index: 1;

    /* Create the illusion of the toolbar floating over the editable. */
    box-shadow: 0 0 5px hsla( 0,0%,0%,.2 );

    /* Use the CKEditor CSS variables to keep the UI consistent. */
    border-bottom: 1px solid var(--ck-color-toolbar-border);
}
.document-editor__toolbar .ck-toolbar {
    border: 0;
    border-radius: 0;
}
/* Make the editable container look like the inside of a native word processor application. */
.document-editor__editable-container {
    padding: calc( 2 * var(--ck-spacing-large) );
    background: var(--ck-color-base-foreground);

    /* Make it possible to scroll the "page" of the edited content. */
    overflow-y: scroll;
}

.document-editor__editable-container .ck-editor__editable {
    /* Set the dimensions of the "page". */
    /* width: 15.8cm; */
    width: 21.0cm;
    height: 29.7cm;

    /* Keep the "page" off the boundaries of the container. */
    padding: 1cm 2cm 2cm;
    /* padding: 4.54cm 2.54cm; */

    border: 1px hsl( 0,0%,82.7% ) solid;
    border-radius: var(--ck-border-radius);
    background: white;

    /* The "page" should cast a slight shadow (3D illusion). */
    box-shadow: 0 0 5px hsla( 0,0%,0%,.1 );

    /* Center the "page". */
    margin: 0 auto;
}
.document-editor .ck-content,
.document-editor .ck-heading-dropdown .ck-list .ck-button__label {
    font: 16px/1.6 "Helvetica Neue", Helvetica, Arial, sans-serif;
}
/* Adjust the headings dropdown to host some larger heading styles. */
.document-editor .ck-heading-dropdown .ck-list .ck-button__label {
    line-height: calc( 1.7 * var(--ck-line-height-base) * var(--ck-font-size-base) );
    min-width: 6em;
}

/* Scale down all heading previews because they are way too big to be presented in the UI.
Preserve the relative scale, though. */
.document-editor .ck-heading-dropdown .ck-list .ck-button:not(.ck-heading_paragraph) .ck-button__label {
    transform: scale(0.8);
    transform-origin: left;
}

/* Set the styles for "Heading 1". */
.document-editor .ck-content h2,
.document-editor .ck-heading-dropdown .ck-heading_heading1 .ck-button__label {
    font-size: 2.18em;
    font-weight: normal;
}

.document-editor .ck-content h2 {
    line-height: 1.37em;
    padding-top: .342em;
    margin-bottom: .142em;
}

/* Set the styles for "Heading 2". */
.document-editor .ck-content h3,
.document-editor .ck-heading-dropdown .ck-heading_heading2 .ck-button__label {
    font-size: 1.75em;
    font-weight: normal;
    color: hsl( 203, 100%, 50% );
}

.document-editor .ck-heading-dropdown .ck-heading_heading2.ck-on .ck-button__label {
    color: var(--ck-color-list-button-on-text);
}

/* Set the styles for "Heading 2". */
.document-editor .ck-content h3 {
    line-height: 1.86em;
    padding-top: .171em;
    margin-bottom: .357em;
}

/* Set the styles for "Heading 3". */
.document-editor .ck-content h4,
.document-editor .ck-heading-dropdown .ck-heading_heading3 .ck-button__label {
    font-size: 1.31em;
    font-weight: bold;
}

.document-editor .ck-content h4 {
    line-height: 1.24em;
    padding-top: .286em;
    margin-bottom: .952em;
}

/* Set the styles for "Paragraph". */
.document-editor .ck-content p {
    font-size: 1em;
    line-height: 1.63em;
    padding-top: .5em;
    margin-bottom: 1.13em;
}
/* Make the block quoted text serif with some additional spacing. */
.document-editor .ck-content blockquote {
    font-family: Georgia, serif;
    margin-left: calc( 2 * var(--ck-spacing-large) );
    margin-right: calc( 2 * var(--ck-spacing-large) );
}
</style>
