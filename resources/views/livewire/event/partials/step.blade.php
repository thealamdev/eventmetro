<div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
    <div>
        <div class="flex justify-between items-center px-9">
            <div class="basis-1/2 relative">
                <div class="relative flex justify-center items-center w-[40px] h-[40px] rounded-full bg-primary-400 z-10">
                    <x-svg.capture />
                </div>
                <div class="absolute w-full h-[4px] bg-primary-400 inset-y-1/2 -z-5"></div>
            </div>
            <div class="basis-1/2 relative">
                <div class="relative flex justify-center items-center w-[40px] h-[40px] rounded-full bg-primary-600 z-10">
                    <x-svg.file />
                </div>
                <div class="absolute w-full h-[4px] bg-primary-600 inset-y-1/2 -z-5"></div>
            </div>
            <div class="relative">
                <div class="relative flex justify-center items-center w-[40px] h-[40px] rounded-full bg-primary-600 z-10">
                    <x-svg.publish />
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center">
            <div class="basis-1/2">
                <p class="text-paragraph pt-1">Events Details</p>
            </div>
            <div class="basis-1/2">
                <p class="text-paragraph pt-1" style="margin-left:-42px">Create Tickets</p>
            </div>
            <div>
                <p class="pt-1 absolute w-[200px] text-paragraph" style="margin-left:-130px;margin-top:-12px">Publish And Review</p>
            </div>
        </div>
    </div>
</div>