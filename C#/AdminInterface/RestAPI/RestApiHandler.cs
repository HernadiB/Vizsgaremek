using System;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Net.Http.Json;
using System.Text.Json;
using System.Threading.Tasks;

namespace AdminInterface.RestAPI
{
    public class RestApiHandler
    {
        HttpClient client = new HttpClient();
        public RestApiHandler(string base_url)
        {
            client.BaseAddress = new Uri(base_url);
            client.DefaultRequestHeaders.Accept.Clear();
            client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
        }
        public T GetObject<T>(string path) where T : class
        {
            T retval = null;
            HttpResponseMessage responseMessage = client.GetAsync(path).Result;
            if (responseMessage.IsSuccessStatusCode)
            {
                string str = responseMessage.Content.ReadAsStringAsync().Result;
                retval = JsonSerializer.Deserialize<T>(str);
            }
            return retval;
        }
        public async Task<bool> PostObject<T>(string path, T obj) where T : class
        {
            JsonContent content = JsonContent.Create(obj);
            HttpResponseMessage responseMessage = await client.PostAsync(path, content);
            return responseMessage.IsSuccessStatusCode;
        }
        public async Task<bool> PutObject<T>(string path, T obj) where T : class
        {
            JsonContent content = JsonContent.Create(obj);
            HttpResponseMessage responseMessage = await client.PutAsync(path, content);
            return responseMessage.IsSuccessStatusCode;
        }
    }
}
