import React, { useState } from 'react'
import { View, Text } from 'react-native'
import AppStack from '../../navigation/AppNavigation'
import AuthStack from '../../navigation/AuthNavigation'

const index = () => {
  const [token] = useState(false)
  return !token ? <AuthStack /> : <AppStack />
}

export default index
