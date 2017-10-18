<div class="clear one-line">
    <span>添加习题：</span>
    <div class="f-l p-r no-exer">
        <a id="personHw-uploadExer" class="ic-blueB-btn personHw" data-href="/uploadExercise/{{$class_id}}/{{$course_id}}/workUpLoad">上传习题</a>
        <a id="personHw-checkExercise" class="ic-blueB-btn personHw" data-href="/exercise/{{$class_id}}/{{$course_id}}">题库选题</a>
    </div>
    <div class="has-exer">
        <table class="d-b of-h border person-exer-list">
            <thead class="d-b">
                <tr>
                    <th>
                        <input id="all-checked" type="checkbox"/>
                        <span>序号</span>
                    </th>
                    <th>题型</th>
                    <th>题目</th>
                    <th class="jobNum"></th>
                </tr>
            </thead>
            <tbody class="d-b work_tbody">
            </tbody>
        </table>
        <div class="ta-c border tfoot">
            <button class="f-l addExerBtn ic-blue c-d blue-hover">
                <i class="p-r fa fa-trash-o"></i>
                <span id="delete-personHw">删除</span>
            </button>
        </div>
    </div>
</div>