<template>
    <div>
        <div class="setting-1">
            <label for="">Approval</label>
            <div class="flex-container-1">
                <div class="flex-container-2">
                    <div>
                        <span>Patient</span>
                    </div>
                    <div>
                        <select>
                            <option>auto</option>
                            <option>manual</option>
                            <option>email-approval</option>
                        </select>
                    </div>
                </div>

                <div class="flex-container-2">
                    <div>
                        <span>Hospital</span>
                    </div>
                    <div>
                        <select>
                            <option>auto</option>
                            <option>manual</option>
                        </select>
                    </div>
                </div>

                <div class="flex-container-2">
                    <div>
                        <span>Doctor</span>
                    </div>
                    <div>
                        <select>
                            <option>auto</option>
                            <option>manual</option>
                        </select>
                    </div>
                </div>
                <div class="flex-container-2" style="justify-content:flex-end">
                    <button class="save-btn">save</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {

        }
    }
}
</script>
<style scoped>
label{
    font-weight: bold;
    font-size: 18px;
    padding : 10px ;
}
.setting-1 {
    width : 50%;
    background-color: white;
    min-height : 30vh;
    border: 2px solid lightgrey;
}
.flex-container-1 {
    display : flex ;
    flex-direction: column; 
}
.flex-container-2{
   
    display : flex ;
    flex-direction: row;
    /* border: 1px solid red ; */
    justify-content: space-between;
    padding: 20px;    
}
.flex-container-2 select {
    width : 10vw ;
}
.save-btn{
    border : 2px solid lightgrey ;
    width : 10vw ;
    height : 5vh ;
    font-size : 2vh;
    padding : 10px ;
    justify-self: flex-end;
    background-color :  #6f9e6f ;
}
</style>