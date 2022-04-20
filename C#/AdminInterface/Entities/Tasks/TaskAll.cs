using System.Collections.Generic;

namespace AdminInterface.Entities.Tasks
{
    public class TaskAll
    {
        public List<TaskEntity> data { get; set; }
        public TaskAll(List<TaskEntity> data)
        {
            this.data = data;
        }
    }
}
