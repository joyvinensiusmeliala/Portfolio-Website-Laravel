@extends('frontend.layouts.master')

@section('title','Joy Vinensius Meliala || Portfolio')

@section('main-content')

    {{--  start script about us    --}}

    <!-- Breadcrumbs -->

    <div class="section pt-4 px-3 px-lg-4" id="about">
        <div class="container-narrow">
          <div class="row">
            <div class="col-md-6">
                @php
                    $settings=DB::table('settings')->get();
                @endphp

                
                @if($settings)
            @foreach($settings as $key=>$data)
              <h2 class="h4 my-2">Hello! I’m @foreach($settings as $data) {{$data->nama}}@endforeach.</h2>
              <p>{!! preg_replace("/^(.*)<br.*\/?>/m", '<p>$1</p>' , ($data->description)) !!}</p>
              @endforeach
            @endif
              <div class="row mt-3">
                <div class="col-sm-2">
                  <div class="pb-1">Age:</div>
                </div>
                <div class="col-sm-10">
                  <div class="pb-1 fw-bolder">24</div>
                </div>
                <div class="col-sm-2">
                  <div class="pb-1">Email:</div>
                </div>
                <div class="col-sm-10">
                  <div class="pb-1 fw-bolder">@foreach($settings as $data) {{$data->email}} @endforeach</div>
                </div>
                {{--  <div class="col-sm-2">
                  <div class="pb-1">Skype:</div>
                </div>
                <div class="col-sm-10">
                  <div class="pb-1 fw-bolder">jvinensius@gmail.com</div>
                </div>  --}}
                <div class="col-sm-2">
                  <div class="pb-1">Phone:</div>
                </div>
                <div class="col-sm-10">
                  <div class="pb-1 fw-bolder">@foreach($settings as $data) {{$data->phone}} @endforeach</div>
                </div>
                <div class="col-sm-2">
                  <div class="pb-1">Address:</div>
                </div>
                <div class="col-sm-10">
                  <div class="pb-1 fw-bolder">@foreach($settings as $data) {{$data->address }}@endforeach</div>
                 
                </div>
                <div class="col-sm-2">
                  <div class="pb-1">Status:</div>
                </div>
                <div class="col-sm-10">
                  <div class="pb-1 fw-bolder">@foreach($settings as $data) {{$data->status}}@endforeach</div>
                </div>
              </div>
            </div>
            <div class="col-md-5 offset-md-1" data-aos="fade-left" data-aos-delay="100"><img class="avatar img-fluid mt-2" src="{{asset('frontend/images/joy.jpg')}}" width="400" height="400" alt="Walter Patterson"/></div>
          </div>
        </div>
      </div>

    {{--  end script about us   --}}

    {{--  start script education   --}}

    {{--  <!-- <div class="section px-3 px-lg-8 pt-5" id="education"> -->  --}}
        <div class="section px-2 px-lg-4 pt-5" id="education"></div>
        {{--  <!-- <div class="section px-3 px-lg-8 px-lg-5" id="education"> -->  --}}
        <div class="container-narrow">
          <div class="text-center mb-5">
         
            <h2 class="marker marker-center">My Education</h2>
          </div>
          
          <!-- <div class="text-center">
            <p class="mx-auto mb-3" style="max-width:600px"> I offer services fit for any website or app. I can quickly maximize timely deliverables for real-time schemas.</p>
          </div> -->
          <div class="container-narrow">
            
            <div class="row">
            @php
                $pendidikan=DB::table('pendidikans')->get();
                
            @endphp
            @if($pendidikan)
            @foreach($pendidikan as $key=>$pendidikans)
              <div class="col-md-4 offset-md-1" data-aos="fade-right" data-aos-delay="100"><img class="avatar img-fluid mt-1" src="{{asset('frontend/images/education/itdel.jpg')}}" width="200" height="200" alt="Walter Patterson"/></div>
              <div class="col-md-5">
                <h2 class="h4 my-1">@foreach($pendidikan as $pendidikans) {{$pendidikans->tempat_pendidikan}} @endforeach</h2>
                <!-- <p>I am graduated from Del Institute Of Technology. I am a skilled front-end developer and master of graphic design tools such as Photoshop and Sketch. I am a quick learner and a team worker that gets the job done. I can easily capitalize on low hanging fruits and quickly maximize timely deliverables for real-time schemas.</p> -->
                <div class="row mt-3">
                  <div class="col-sm-4">
                    <div class="pb-1">Degree </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="pb-1">: </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="pb-1 fw-bolder">@foreach($pendidikan as $pendidikans) {{$pendidikans->jenjang_pendidikan}} @endforeach</div>
                  </div>
                  <div class="col-sm-4">
                    <div class="pb-1">Field Of Study</div>
                  </div>
                  <div class="col-sm-1">
                    <div class="pb-1">: </div>
                  </div>
                  <div class="col-sm-6  ">
                    <div class="pb-1 fw-bolder">@foreach($pendidikan as $pendidikans) {{$pendidikans->jurusan}} @endforeach</div>
                  </div>
                  <div class="col-sm-4">
                    <div class="pb-1">Start Date</div>
                  </div>
                  <div class="col-sm-1">
                    <div class="pb-1">: </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="pb-1 fw-bolder">{{ date('d F Y', strtotime($pendidikans->start_pendidikan))}} </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="pb-1">End Date</div>
                  </div>
                  <div class="col-sm-1">
                    <div class="pb-1">: </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="pb-1 fw-bolder">{{ date('d F Y', strtotime($pendidikans->end_pendidikan))}}</div>
                  </div>
                </div>
              </div>
              @endforeach
            @endif
            </div>
          </div>
        </div>
      </div>

    {{--  end script education   --}}

    {{--  start script service   --}}

    <div class="section px-3 px-lg-4 pt-5" id="services">
        <div class="container-narrow">
          <div class="text-center mb-5">
            <h2 class="marker marker-center">My Services</h2>
          </div>
          <div class="text-center">
            <p class="mx-auto mb-3" style="max-width:600px"> I offer services fit for any website or app. I can quickly maximize timely deliverables for real-time schemas.</p>
          </div>
          <div class="row py-3">
            <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="100"><img class="mb-2" src="{{asset('frontend/images/services/web-design.svg')}}" width="96" height="96" alt="web design"/>
              <div class="h5">Web Design</div>
            </div>
            <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="200"><img class="mb-2" src="{{asset('frontend/images/services/graphic-design.svg')}}" width="96" height="96" alt="graphic design"/>
              <div class="h5">Graphic Design</div>
            </div>
            <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="300"><img class="mb-2" src="{{asset('frontend/images/services/ui-ux.svg')}}" width="96" height="96" alt="ui-ux"/>
              <div class="h5">UI/UX</div>
            </div>
            <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="400"><img class="mb-2" src="{{asset('frontend/images/services/app-development.svg')}}" width="96" height="96" alt="app development"/>
              <div class="h5">App Development</div>
            </div>
          </div>
        </div>
      </div>

    {{--  end start service   --}}

    <div class="section px-3 px-lg-4 pt-5" id="skills">
        <div class="container-narrow">
          <div class="text-center mb-5">
            <h2 class="marker marker-center">My Skills</h2>
          </div>
          <div class="text-center">
            <p class="mx-auto mb-3" style="max-width:600px">I am a quick learner and specialize in multitude of skills required for Web Application Development and Product Design</p>
          </div>
          <div class="bg-light p-3">
            <div class="row">
            @php
                $skill_programming=DB::table('skill_programmings')->get();
                
            @endphp
            @if($skill_programming)
            @foreach($skill_programming as $key=>$skill_progrm)
              <div class="col-md-5">
                <div class="py-1">
                  <div class="d-flex text-small fw-bolder"><span class="me-auto">{{$skill_progrm->nama_skill}}</span><span>{{$skill_progrm->level}}%</span></div>
                  <div class="progress my-1">
                    <div class="progress-bar bg-primary" role="progressbar" data-aos="zoom-in-right" data-aos-delay="100" data-aos-anchor=".skills-section" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                
              </div>
              @endforeach
            @endif
            </div>
          </div>
        </div>
      </div>

      <div class="section px-2 px-lg-4 pt-5" id="portfolio">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="marker marker-center">Portfolio </h2>
          </div>
          <div class="grid bp-gallery pb-3" data-aos="zoom-in-up" data-aos-delay="100">
            <div class="grid-sizer"></div>
            <div class="grid-item"><a href="https://dribbble.com">
                <figure class="portfolio-item"><img src="images/portfolio/1-small.png" data-bp="images/portfolio/1.jpg"/>
                  <figcaption>
                    <h4 class="h5 mb-0">Web Design</h4>
                    <div>Dribbble.com</div>
                  </figcaption>
                </figure></a></div>
            <div class="grid-item"><a href="https://github.com">
                <figure class="portfolio-item"><img src="images/portfolio/2-small.png" data-bp="images/portfolio/2.jpg" data-caption="Example of an optional caption."/>
                  <figcaption>
                    <h4 class="h5 mb-0">Web Development</h4>
                    <div>GitHub.com</div>
                  </figcaption>
                </figure></a></div>
            <div class="grid-item"><a href="https://soundcloud.com/">
                <figure class="portfolio-item"><img src="images/portfolio/3-small.png" data-bp="images/portfolio/3.jpg" data-caption="Example of an optional caption."/>
                  <figcaption>
                    <h4 class="h5 mb-0">Audio Mixing</h4>
                    <div>Soundcloud.com</div>
                  </figcaption>
                </figure></a></div>
            <div class="grid-item"><a href="https://www.adobe.com/">
                <figure class="portfolio-item"><img src="images/portfolio/4-small.png" data-bp="images/portfolio/4.jpg"/>
                  <figcaption>
                    <h4 class="h5 mb-0">Video Editing</h4>
                    <div>Adobe After Effects</div>
                  </figcaption>
                </figure></a></div>
            <div class="grid-item"><a href="https://www.adobe.com/">
                <figure class="portfolio-item"><img src="images/portfolio/5-small.png" data-bp="images/portfolio/5.jpg"/>
                  <figcaption>
                    <h4 class="h5 mb-0">Photography</h4>
                    <div>Adobe Photoshop</div>
                  </figcaption>
                </figure></a></div>
            <div class="grid-item"><a href="https://www.android.com/">
                <figure class="portfolio-item"><img src="images/portfolio/6-small.png" data-bp="images/portfolio/6.jpg"/>
                  <figcaption>
                    <h4 class="h5 mb-0">App Development</h4>
                    <div>Android</div>
                  </figcaption>
                </figure></a></div>
            <div class="grid-item"><a href="https://flutter.dev/">
                <figure class="portfolio-item"><img src="images/portfolio/7-small.png" data-bp="images/portfolio/7.jpg"/>
                  <figcaption>
                    <h4 class="h5 mb-0">App Design</h4>
                    <div>Flutter</div>
                  </figcaption>
                </figure></a></div>
            <div class="grid-item"><a href="https://flutter.dev/">
                <figure class="portfolio-item"><img src="images/portfolio/8-small.png" data-bp="images/portfolio/8.jpg"/>
                  <figcaption>
                    <h4 class="h5 mb-0">App Development</h4>
                    <div>Flutter</div>
                  </figcaption>
                </figure></a></div>
          </div>
        </div>
      </div>

      <div class="section px-3 px-lg-4 pt-5" id="project">
        <div class="container-narrow">
          <div class="text-center mb-5">
            <h2 class="marker marker-center">Project Undertakens</h2>
          </div>
          <div class="row">
            @php
                $project=DB::table('projects')->get();
                // dd($categories);
            @endphp
            @if($project)
            @foreach($project as $key=>$projects)
            <div class="col-md-6">
              <div class="card mb-3" data-aos="fade-right" data-aos-delay="100">
                <div class="card-header px-4 py-2">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h3 class="h5 mb-1">{{$projects->nama_project}}</h3>
                      <div class="text-muted text-small"><b>{{$projects->penyelenggara}}</b> - {{$projects->lokasi}}</div>
                      <div class="text-muted text-small"> <small><b>{{ date('d F Y', strtotime($projects->start_project))}} - {{ date('d F Y', strtotime($projects->end_project))}}</b></small></div>
                      <div class="text-muted text-small"> <small><b>As : {{$projects->sebagai}}</b></small></div>
                      {{--  $today = Carbon::now()->isoFormat('D MMMM Y');  --}}
                    </div>
                    {{--  <img src="images/services/ui-ux.svg" width="48" height="48" alt="ui-ux"/>  --}}
                    {{--  <img src="{{$projects->photo}}" alt="logo" width="50px" height="50px" />  --}}
                  </div>
                </div>

                <div class="card-body px-4 py-3">
                  <p>
                     <b>Deskripsi Project : </b>
                    <small>
                      {{--  {{$projects->deskripsi}}  --}}

                    {!! preg_replace("/^(.*)<br.*\/?>/m", '<p>$1</p>' , ($projects->deskripsi)) !!}
                    {{--  preg_replace("/^(.*)<br.*\/?>/m", '<p>$1</p>', $string);  --}}

                  </small>
                  </p>
                  {{--  <p>Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>  --}}
                </div>
              </div>
            </div>
            @endforeach
            @endif



          </div>
        </div>
      </div>

      <div class="section px-3 px-lg-4 pt-5" id="experience">
        <div class="container-narrow">
          <div class="text-center mb-5">
            <h2 class="marker marker-center">Experience</h2>
          </div>
          <div class="row">
            @php
                $pekerjaan=DB::table('pekerjaans')->orderBy('id','DESC')->get();

                
                // dd($categories);
            @endphp
            @if($pekerjaan)
            @foreach($pekerjaan as $key=>$kerja)
            <div class="col-md-12">
              <div class="card mb-3" data-aos="fade-right" data-aos-delay="100">
                <div class="card-header px-4 py-2">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h3 class="h5 mb-1">{{$kerja->nama_pekerjaan}}</h3>
                      <div class="text-muted text-small"><b>{{$kerja->nama_perusahaan}}</b> - {{$kerja->lokasi}}</div>
                      <div class="text-muted text-small"><small>{{ date('d F Y', strtotime($kerja->start_bekerja))}} - {{ date('d F Y', strtotime($kerja->end_bekerja))}}</small></div>
                    </div>
                    {{--  <img src="images/services/ui-ux.svg" width="48" height="48" alt="ui-ux"/>  --}}
                    <img src="{{$kerja->photo}}" alt="logo" width="50px" height="50px" />
                  </div>
                </div>
                <div class="card-body px-4 py-3">
                  <p>
                    <b>Deskripsi Pekerjaan : </b>
                    <small>
                    {!! preg_replace("/^(.*)<br.*\/?>/m", '<p>$1</p>' , ($kerja->job_desc)) !!}
                    </small>
                  </p>
                </div>
              </div>
            </div>
            @endforeach
            @endif

            

          </div>
        </div>
      </div>

      <div class="section px-2 px-lg-4 pb-4 pt-5 mb-5" id="contact">
        <div class="container-narrow">
          <div class="text-center mb-5">
            <h2 class="marker marker-center">Contact Me</h2>
          </div>
          <div class="row">
            <div class="col-md-6" data-aos="zoom-in" data-aos-delay="100">
              <div class="bg-light my-2 p-3 pt-2"><form action="https://formspree.io/your@email.com"
          method="POST">
          <div class="form-group my-2">
            <label for="name" class="form-label fw-bolder">Name</label>
            <input class="form-control" type="text" id="name" name="name" required>
          </div>
          <div class="form-group my-2">
            <label for="email" class="form-label fw-bolder">Email</label>
            <input class="form-control" type="email" id="email" name="_replyto" required>
          </div>
        <div class="form-group my-2">
          <label for="message" class="form-label fw-bolder">Message</label>
          <textarea class="form-control" style="resize: none;" id="message" name="message" rows="4" required></textarea>
        </div>
        <button class="btn btn-primary mt-2" type="submit">Send</button>
      </form>
              </div>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-delay="300">
              <div class="mt-3 px-1">
                <div class="h5">Let’s talk how I can help you!</div>
                <p>If you like my work and want to avail my services then drop me a message using the contact form. </p>
                <p>Or get in touch using my email, skype or my contact number.</p>
                <p>See you!</p>
              </div>
              <div class="mt-53 px-1">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="pb-1">Email:</div>
                  </div>
                  <div class="col-sm-10">
                    <div class="pb-1 fw-bolder">@foreach($settings as $data) {{$data->email}} @endforeach</div>
                  </div>
                  
                  <div class="col-sm-2">
                    <div class="pb-1">Phone:</div>
                  </div>
                  <div class="col-sm-10">
                    <div class="pb-1 fw-bolder">@foreach($settings as $data) {{$data->phone}} @endforeach</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
