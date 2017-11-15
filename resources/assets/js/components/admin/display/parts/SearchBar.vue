<template>

    <li class="navbar-search">
        <!-- Just view on mobile screen-->
        <a href="#" class="trigger-search"><i class="fa fa-search"></i></a>
        <form class="navbar-form">
            <div class="form-group has-feedback">
                <input type="text" name="typeahead" class="form-control typeahead rounded" placeholder="Search for Users, Pages, Beats, Licenses">
                <button type="submit" class="btn btn-theme fa fa-search form-control-feedback rounded"></button>
            </div>
        </form>
    </li>

</template>

<script>

    export default {
        props: [

        ],

        data(){
            return {
                searchLength: $('.typeahead').length,
            };
        },
        mounted(){
            this.handleTypeHead();
        },
        methods:{
            // =========================================================================
            // TYPEAHEAD
            // =========================================================================
            handleTypeHead: function () {

                $('.typeahead').typeahead({
                        display: ["series", "description"],
                        source: {
                            data: [
                                {
                                    series: "Breaking Bad",
                                    description: "A chemistry teacher ...",
                                    seasons: 5,
                                    rating: 9.6
                                },{
                                    series: "Game of Thrones",
                                    description: "Several noble families fight ...",
                                    seasons: 4,
                                    rating: 9.5
                                },{
                                    series: "Dexter",
                                    description: "A Miami police forensics ...",
                                    seasons: 8,
                                    rating: 9.0
                                }

                            ],
                            /*capital: {
                                data: [

                                ]
                            }*/
                        },
                        templates: {
                            empty: [
                                '<div class="empty-message">',
                                'unable to find your type that match the current query',
                                '</div>'
                            ].join('\n'),

                            suggestion: function(){
                                return [
                                    '<a href="javascript:void(0);" class="media border-dotted animated fadeIn">',
                                    '<span class="media-left">' ,
                                    '<span class="media-object">',
                                    '<i class="fa fa-{{icon}} bg-{{color}}"></i>',
                                    '</span>',
                                    '</span>',
                                    '<span class="media-body">',
                                    '<span class="media-heading">{{series}}</span>',
                                    '<span class="media-text">{{description}}</span>',
                                    '</span>',
                                    '</a>'
                                ].join('')
                            }
                        }
                    });

            },
        }
    }
</script>