import axios from 'axios'

const instagramAPI = axios.create({
  baseURL: 'http://localhost/instagram/api/endpoints',
})

export default instagramAPI
