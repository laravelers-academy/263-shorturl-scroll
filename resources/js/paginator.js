window.paginator = {

    next_page_url: null,

    data: {},

    has_more: true,

    scroll_container: document.getElementById('scroll-container'),

    template: `

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <a href="__URL__" target="_blanck">http://sh.test/__CODE__</a>    

                </div>

            </div>

        </div>

    `,

    load_items: (url) => {

        if(paginator.has_more){

            axios.get(url).then((res) => {

                let response            = JSON.parse(res.data.urls);

                paginator.next_page_url = response.next_page_url;

                paginator.fill_items(response.data);

                paginator.has_more();

            }).catch((error) => {

                console.log(error);

            });

        }

    },

    fill_items: (data) => {

        data.forEach((i,j) => {

            let item_template = paginator.template;

            item_template = item_template.replace('__URL__', i.url);
            item_template = item_template.replace('__CODE__', i.code);

            paginator.scroll_container.innerHTML += item_template;

        });

    },

    has_more: () => {

        if(paginator.next_page_url == null){

            paginator.has_more = false;

        }
                
    }

}