namespace AdminInterface.Entities.Levels
{
    public class LevelEntity
    {
        public int ID { get; set; }
        public string Name { get; set; }
        public LevelEntity() { }
        public LevelEntity(int id, string name)
        {
            ID = id;
            Name = name;
        }
    }
}
