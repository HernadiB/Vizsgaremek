namespace AdminInterface.Entities.Tasks
{
    public class TaskEntity
    {
        public int ID { get; set; }
        public string Name{ get; set; }
        public string Description { get; set; }
        public int Score { get; set; }
        public string Level { get; set; }
        public TaskEntity() { }
        public TaskEntity(int id, string name, string description, int score, string level)
        {
            ID = id;
            Name = name;
            Description = description;
            Score = score;
            Level = level;
        }
    }
}
