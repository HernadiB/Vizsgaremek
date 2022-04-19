namespace AdminInterface.Entities.Tasks
{
    public class TaskByID
    {
        public TaskEntity data { get; set; }
        public TaskByID() { }
        public TaskByID(TaskEntity task)
        {
            this.data = task;
        }
    }
}
