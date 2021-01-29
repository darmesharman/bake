
<template>
<div>
rgr

    <div v-if="this.$store.state.hashome_data">
        <form>
            <!--  action=" route('companies.index') }}" method="GET" -->
            <section class="first-slide bg-cov rel" style="background-image: url()">
                <div class="mask stretch-a"></div>
                <div class="container">
                    <div class="wrapper">
                        <h1>Каталог детских организации</h1>
                        <p class="grey-text mg-text">Детские сады, образовательные центры, спортивные кружки и многое другое.</p>
                        <div class="fs-search mb3 mt3">
                            <div class="search-fields">
                                <select name="sitiID" v-model="$store.state.home.searchForm.cityID" class="dynamic-list required">
                                    <option value=""></option>
                                    
                                    <option :value="city.id" v-for="(city, index) in this.$store.state.home.cities" :key="city.id" >
                                        {{city.name}}
                                    </option>

                                    <!-- @foreach($cities as $city)
                                        <option value=" $city->id }}"  Request::input('sitiID') == $city->id ? 'selected' : '' }}>
                                            $city->name }}
                                        </option>
                                    @endforeach -->
                                </select>
                                <select name="distID" v-model="this.$store.state.home.searchForm.destrictID" class="dynamic-list required">
                                    <option value=""></option>
                                    <option :value="district.id" v-for="(district, index) in this.$store.state.home.districts" :key="district.id" >
                                        {{district.name}}
                                    </option>
                                    <!-- @foreach($districts as $district)
                                        <option value=" $district->id }}"  Request::input('distID') == $district->id ? 'selected' : '' }}>
                                            $district->name }}
                                        </option>
                                    @endforeach -->
                                </select>
                                
                                <select name="kategoriID" v-model="this.$store.state.home.searchForm.categoryID" class="dynamic-list required">
                                    <option value=""></option>
                                        <option :value="category.id" v-for="(category, index) in this.$store.state.home.categories" :key="category.id" >
                                            {{category.name}}
                                        </option>
                                    <!-- @foreach($categories as $category)
                                        <option value=" $category->id }}"  Request::input('kategoriID') == $category->id ? 'selected' : '' }}>
                                            $category->name }}
                                        </option>
                                    @endforeach -->
                                </select>
                            </div>
                            <!-- <button class="btn lg-text input" @click="fetchSearchCompanies()" >Поиск</button> -->
                        </div>
                        <p class="grey-text">Или выберите популярные категории:</p>
                        <div class="tags small theme">
                            <div class="line">
                                <a href=""  v-for="(category, index) in this.$store.state.home.categories" :key="category.id" class="tag">
                                    {{category.name}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </form>
                <button class="btn lg-text input" @click="fetchSearchCompanies()" >Поиск</button>

            <section class="companies p">
                <div class="container">
                    <div class="wrapper article-bg">
                        <div class="tac article">
                            <h3 class="section-title">Каталог</h3>
                            <div class="tabs center">
                                <div class="tab active">Популярные</div>
                                <div class="tab">Лучшие</div>
                                <div class="tab">Новые</div>
                                <div class="tab">Все</div>
                            </div>
                        </div>
                        <div class="companies-slider slick-m">

                            <a href="" v-for="(company, index) in this.$store.state.home.companies" :key="company.id" class="company-item bg-cov rel db" 
                             style="background-image: url('../images/HlgZihTyFOE.jpg');">
                                <div class="stretch-a mask"></div>

                                <div class="content">
                                    <div class="tags-icon">
                                        <div class="line">
                                            <div class="tag icon-check no-hov">Верифицирован</div>
                                        </div>
                                    </div>
                                    <div class="rating"> {{company.rating }}</div>
                                    <div class="text white">
                                        <h5>Детский сад  {{company.name }}</h5>
                                        <p class="grey-text lg-text"> {{company.city.name }}</p>
                                    </div>
                                </div>
                                
                            </a>
                            <!-- @foreach ($companies as $company)
                                    <a href=" route('companies.show', $company) }}" class="company-item bg-cov rel db"
                                    @if ($company->profileImages->isNotEmpty())
                                        style="background-image: url(
                                            asset($company->profileImages[0]->path) }}
                                            );"
                                    @endif
                                    >
                                    <div class="stretch-a mask"></div>
                                    <div class="content">
                                        <div class="tags-icon">
                                            <div class="line">
                                                <div class="tag icon-check no-hov">Верифицирован</div>
                                            </div>
                                        </div>
                                        <div class="rating"> $company->rating }}</div>
                                        <div class="text white">
                                            <h5>Детский сад  $company->name }}</h5>
                                            <p class="grey-text lg-text"> $company->city->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach -->

                        </div>
                    </div>
                </div>
            </section>

            <section class="p-lg white rel bg-fix">
                <div class="blackout-a"></div>
                <div class="container">
                    <div class="grid-2 wrapper rel z2">
                        <div class="line">
                            <div class="article">
                                <h2>Streamline Your Business</h2>
                                <p class="lg-text">We’re full-service, local agents who know how to find people and home each together. We use online tools with an unmatched search capability to make you smarter and faster.</p>
                                <button class="btn">Начать сотрудничество</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="p">
                <div class="container">
                    <div class="wrapper article-bg">
                        <div class="article tac">
                            <h2 class="section-title">Последние события</h2>
                            <p class="lg-text grey-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo ducimus minus voluptates.</p>
                        </div>
                        <div class="grid-3">
                            <div class="line">

                                <div class="blog-card rel white" v-for="(blog, index) in this.$store.state.home.blogs" :key="blog.id" >
                                    <div class="tags abs z3 small theme">
                                        <div class="line">
                                            
                                            <a  v-for="(tag, tag_index) in blog.tags" :key="tag.id" href="#" class="tag"> {{ tag.name }}</a>
                                            
                                            <!-- @foreach ($blog->tags as $tag)
                                                <a class="tag" href="#"> $tag->name }}</a>
                                            @endforeach -->

                                        </div>
                                    </div>
                                    <div class="image bg-cov stretch-a" style="background-image: url( asset($blog->blogImage->path) }})"></div>
                                    <a href="#" class="content-wrapper db rel z2 grey static">
                                        <div class="content article-sm">
                                            <div class="date highlight no-hov grey small"> date_format($blog->created_at, 'Y-m-d') }}</div>
                                            <h4>{!! $blog->title !!}</h4>
                                            <p>{!! substr($blog->content, 0, 100) !!}</p>
                                        </div>
                                    </a>
                                </div>

                            <!-- @foreach ($blogs as $blog)
                                <div class="blog-card rel white">
                                    <div class="tags abs z3 small theme">
                                        <div class="line">
                                            @foreach ($blog->tags as $tag)
                                                <a class="tag" href="#"> $tag->name }}</a>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="image bg-cov stretch-a" style="background-image: url( asset($blog->blogImage->path) }})"></div>
                                    <a href="#" class="content-wrapper db rel z2 grey static">
                                        <div class="content article-sm">
                                            <div class="date highlight no-hov grey small"> date_format($blog->created_at, 'Y-m-d') }}</div>
                                            <h4>{!! $blog->title !!}</h4>
                                            <p>{!! substr($blog->content, 0, 100) !!}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach -->


                            </div>
                        </div>
                        <a href="/blog" class="btn bordered-theme mxa large">Смотреть все</a>
                    </div>
                </div>
            </section>

        </div>

    </div>
</template>


<script>

    export default {
        data: {
            
        },
        props: {
        },
        components: {
        },
        sockets: {
            
        },
        methods: {
            fetchSearchCompanies: function() {
                console.log('iceeee')
            }
            
        },
        methods: {
            get_companies() {

            },
            to_push() {
            console.log(445)
            this.$router.push('2')
            },

        },
        mounted() {
          this.$store.dispatch('fetchHome');

        }
}
</script>

<style scoped>

</style>
