<template>
    <li v-if="mainCategory" @click="categoryClick()" class="submenu" :class="{ active: isActive }">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-globe"></i></span> <span class="text">{{mainCategory.name}}</span>
            <span v-if="subCategoriesComputed.length !== 0" class="arrow"></span>
            <span v-show="isActive" class="selected" style="display: none;"></span>
        </a>
        <ul v-if="subCategoriesComputed.length !== 0">
            <li v-for="subCategory in subCategoriesComputed" :class="{ active: subCategory.isActive }"><a @click="subCategoryClick(subCategory)">{{subCategory.name}}</a></li>
        </ul>
    </li>
</template>
<script>
    export default{
        props: {
            mainCategory: {
                required: true
            },
            subCategories: {
                'default': function(){return []},
                type: Array,
            }

        },
        data(){
            return{
                id:'link-category',
                name: null,
                isActive:false,
                subCategoriesComputed: [],
            }
        },
        mounted(){
          this.init();
        },
        methods : {
            init(){
                this.name = this.mainCategory.id;

                let computedSubCategories = [];
                for(let i = 0; i < this.subCategories.length; i ++){
                    computedSubCategories.push({
                        id: this.mainCategory.id + '-' + this.subCategories[i].id,
                        name: this.subCategories[i].name,
                        isActive: false,
                    });
                }
                this.subCategoriesComputed = computedSubCategories;


            },
            categoryClick(){
                if (this.subCategoriesComputed.length === 0){
                    this.$emit('clickedPill', this.name);
                }
                this.isActive = true;
            },
            subCategoryClick(subCategory){
                this.$emit('clickedPill', this.name , subCategory.id);
                for(let i = 0; i < this.subCategoriesComputed.length; i++){
                    this.subCategoriesComputed[i].isActive = false;
                }
                subCategory.isActive = true;


            },
            resetAll(){
                for(let i = 0; i < this.subCategoriesComputed.length; i++){
                    this.subCategoriesComputed[i].isActive = false;
                }
                this.isActive = false;

            },

        }
    }
</script>