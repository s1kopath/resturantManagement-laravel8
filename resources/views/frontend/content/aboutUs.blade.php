@extends('frontend.main')
@section('content')


<!--Body container start-->
<div class="container">


    <div class="row mt-5 mb-5">
      <div class="col-md-5 ">
       <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="2000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img  src="{{asset('/style/image/cr11.jpg')}}" style="height:400px" class="d-block w-100"alt="carousel-img-0">
            </div>
            <div class="carousel-item">
                <img  src="{{asset('/style/image/cr10.jpg')}}" alt=""  style="height:400px"class="d-block w-100"/>

              </div>
            <div class="carousel-item">
                <img  src="{{asset('/style/image/cr9.jpg')}}"  style="height:400px"alt=""class="d-block w-100"/>
            </div>
            <div class="carousel-item">
                <img  src="{{asset('/style/image/cr8.jpg')}}"  style="height:400px"alt="" class="d-block w-100"/>
            </div>
          </div>
        </div>
    </div>


       <div class="col-md-7">
      <div class=" mb-5  ms-5 " style="margin-top:40px;">


            <h2 class=" fs-2 text-center">Welcome to</h2>
            <h1 class="text-center"><ion-icon class="logo-icon" name="fast-food"></ion-icon> Fresh Food <ion-icon class="logo-icon" name="beer"></ion-icon></h1>
            <p class="text-center">Taste the best in town <i class="fas fa-utensils"></i></p>
            <hr/>
            <p class=" fs-6" style="text-align: justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>
        </div>


    </div>
</div>
</div>
<hr/>

    <section >
 <div class="container"style="">
      <h1 class="text-center " >O<span style="color: #dd7140;margin-top:30px;">U</span>R HI<span style="color: #dd7140;margin-top:30px;">STO</span>RY</h1>
      <p class="mt-5 " style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae provident perferendis pariatur optio eaque quia vero dicta ut nihil laudantium nulla tempora maiores, odit voluptatem ipsa officia assumenda porro veritatis sed fugiat corrupti? Hic voluptas accusantium officia voluptatem cumque ducimus molestias facilis quasi saepe magni, laudantium quam doloremque, exercitationem nesciunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae provident perferendis pariatur optio eaque quia vero dicta ut nihil laudantium nulla tempora maiores, odit voluptatem ipsa officia assumenda porro veritatis sed fugiat corrupti? Hic voluptas accusantium officia voluptatem cumque ducimus molestias facilis quasi saepe magni, laudantium quam doloremque, exercitationem nesciunt!</p>
    </div>
    </section>

    <div class="container">
      <div class="row">
        <div class="col-md-12 ms-5">


                <video width="700px" style="margin-left: 190px;"  controls>

                     <source  src="{{ url('/style/image/video2.mp4')}}" type="video/mp4"/>

                </video>

            </div>
          </div>
        </div>

        <section >
            <div class="container"style="">

                 <p class="mt-5  "style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae provident perferendis pariatur optio eaque quia vero dicta ut nihil laudantium nulla tempora maiores, odit voluptatem ipsa officia assumenda porro veritatis sed fugiat corrupti? Hic voluptas accusantium officia voluptatem cumque ducimus molestias facilis quasi saepe magni, laudantium quam doloremque, exercitationem nesciunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae provident perferendis pariatur optio eaque quia vero dicta ut nihil laudantium nulla tempora maiores, odit voluptatem ipsa officia assumenda porro veritatis sed fugiat corrupti? Hic voluptas accusantium officia voluptatem cumque ducimus molestias facilis quasi saepe magni, laudantium quam doloremque, exercitationem nesciunt!</p>
                <p class="mb-5" style="text-align: justify;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Id incidunt totam provident iure nam nesciunt, laborum non possimus eaque voluptate sint aliquam sunt asperiores ipsa necessitatibus facere? Omnis reprehenderit minus voluptatum vitae, deserunt odit obcaecati dignissimos aut nisi praesentium explicabo saepe provident dicta voluptas aliquam incidunt animi, earum cupiditate et aliquid hic ex quos ab. Blanditiis facilis animi incidunt ipsa doloremque beatae? Asperiores molestiae laudantium ipsa repellat! Labore fuga cupiditate repellendus ducimus inventore, sit ut placeat eveniet, ipsa, aspernatur cumque. Laboriosam, totam. Incidunt hic suscipit ratione, in repellendus vel dolores molestias sint enim minima animi labore aliquam voluptatibus consectetur ut!</p>
                </div>
               </section>



@endsection

