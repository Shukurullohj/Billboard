<template>
<modal name="new-project" class="rounded bg-dark " height="auto">
  <form @submit.prevent="submit">
        <div class="p-5 card" >
          <h3 class="text-center mb-4">Create New Tasks</h3>
          <div class="row p-5">
            <div class="col-lg-6">
              <div class="mb-3">
              <label class="ml-1" for="title">Title</label>
              <input name="title" 
              class="form-control" :class="errors.title ? 'border-danger' : 'border'"
             type="text" v-model="form.title">
             <span class="font-italic text-danger" v-if="errors.title" v-text="errors.title[0]"></span>
              </div>
              <div>
              <label class="ml-1"  for="description">Description</label>
              <textarea class="form-control" name="description" id="description" cols="10" rows="5"
              v-model="form.description"></textarea>
              <span class="font-italic text-danger" v-if="errors.description" v-text="errors.description[0]"></span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-2">
              <label class="ml-1" for="task">Task</label>
              <input class="form-control" name="task" type="text"
              v-for="task in form.tasks"
              v-model="task.body"
              >
              </div>
              <button type="button" class="mt-4 bg-white border-0" @click="addTask">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" class="mr-2">
                  <g fill="none" fill-rule="evenodd" opacity=".307">
                    <path stroke="#000" stroke-opacity=".012" stroke-width="0" d="M-3-3h24v24H-3z"></path>
                    <path fill="#000" d="M9 0a9 9 0 0 0-9 9c0 4.97 4.02 9 9 9A9 9 0 0 0 9 0zm0 16c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7zm1-11H8v3H5v2h3v3h2v-3h3V8h-3V5z"></path>
                  </g>
                </svg>

                <span>Add New Task Field</span>
              </button>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn button mr-2" 
            @click="$modal.hide('new-project')">Cancel</button>
            <button  class="btn button">Create Project</button>
          </div>
        </div>
  </form>      
</modal>
</template>

<script>
 export default {
   data() {
      return {
        form : {
          title: '',
          description: '',
          tasks : [
          {body: ''}
        ]
        },
        errors: {}
      };
   },
   methods: {
            addTask() {
                this.form.tasks.push({ value: '' });
            },
            async submit() {
                try {
                    location = (await axios.post('/projects', this.form)).data.message;
                } catch (error) {
                    this.errors = error.response.data.errors;
                }
            }
        }
    }
</script>
