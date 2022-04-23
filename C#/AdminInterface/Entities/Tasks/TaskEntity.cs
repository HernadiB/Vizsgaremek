namespace AdminInterface.Entities.Tasks
{
    public class TaskEntity
    {
        public int ID { get; set; }
        public string Name{ get; set; }
        public string Description { get; set; }
        public string Base64 { get; set; }
        public int Score { get; set; }
        public string Level { get; set; }
        public TaskEntity() { }
        public TaskEntity(int id, string name, string description, string base64, int score, string level)
        {
            ID = id;
            Name = name;
            Description = description;
            Base64 = base64;
            Score = score;
            Level = level;
        }
    }
}
