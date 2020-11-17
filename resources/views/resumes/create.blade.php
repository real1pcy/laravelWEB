@extends('layouts.layout')

@section('head_links')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="stylesheet" href="/css/resume.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/b8d631eee1.js" crossorigin="anonymous"></script>
@endsection

@section('content')

<body>
    @include('layouts.header') 

    <main class="w-100">
        <div class="row container-fluid main_resume_paper">
            <div class="col-2"></div>
            <div class="col-10 colored_page resume_part">
                <div class="resume">
                    <form action="/resume" method="post">
                    @csrf 
                        <h5 class="title">Your resume</h5>
                        <div class="profile_form">
                            <h3>1. Tell us who you are?</h3>
                            <div>
                                <input type="text" value="" name="full_name" placeholder="Full name" required>
                            </div>
                            <br/>
                            <div>
                                <input type="text" value="" name="email" placeholder="E-mail" required>
                                <input type="text" value="" name="phone_number" placeholder="Phone" required>
                            </div>
                            <br/>
                            <div>
                                <input type="text" value="" name="url_portfolio" placeholder="URL to placeholder" required>
                            </div>
                            <!-- <div>
                                <br/>
                                <input type="file" value="" name="attached_resume" placeholder="Attach resume">
                            </div> -->
                        </div>

                        <div class="specialist_form">
                            <h3>2.You're skilled as a...</h3>
                            
                            <div>
                                <select name="spec_id" style="width:400px;">
                                @if(count($specs)!=0)
                                    @foreach($specs as $sp)
                                    <option value="{{$sp->id}}"> {{$sp->name}} </option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                            <br/>

                            <div>
                                <input type="number" value="" name="salary" placeholder="Salary" required>
                                <select style="width:150px;">
                                    <option>KZT</option>
                                  
                                </select>
                            </div>
                            <br/>

                        </div>

<!-- 
                        <div class="main_skills_form">
                            <h3>Main Skills...</h3>
                            <div id="skills">
                            </div>
                            
                            <br/>
                            <div>
                                <input type="text" name="skill" id="add_skill" placeholder="skill">
                                <button class="btn my-2 my-sm-0" type="button" onclick="addSkill()">Keep</button>
                            </div>
                            
                        </div> -->

                        <div class="about_yourself_form">
                            <h3>3.Tell something about yourserf...</h3>
                            <div>
                                <textarea name="description"></textarea>
                            </div>
                        
                        </div>
                        <br/>
                        <button class="btn my-2 my-sm-0">Submit</button>
                    </form>
                </div>
                <br/>
                <br/>
                <br/>
            </div>
        </div>

        
    </main>

    @include('layouts.footer')

    <script type="text/javascript">
        const addSkillInput = document.getElementById("add_skill");
        const addSkill = () => {
            if(addSkillInput.value != ''){
                document.getElementById("skills").innerHTML += 
                `<div class="particular_skill" id="particular_skill_${addSkillInput.value}">
                    <span>${addSkillInput.value}</span>
                    <span class="particular_skill_remove" onclick="removeSkill('particular_skill_${addSkillInput.value}')">
                        <i class="far fa-trash-alt"></i>
                        </span>
                </div>`
            }

            addSkillInput.value = "";
        }

        const removeSkill = (id) => {
            // alert(id);
            document.getElementById(id).style.display = "none"; 
        }
    </script>

</body>
@endsection

