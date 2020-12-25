import axios from 'axios'

export default instagramAPI = axios.create({
  baseUrl: 'http://localhost/instagram/api/endpoints',
})
