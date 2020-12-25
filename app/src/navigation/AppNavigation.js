import React from 'react'
import { createStackNavigator } from '@react-navigation/stack'
import Home from '../modules/home'
import Signup from '../modules/signup'
import AuthStack from './AuthNavigation'

const Stack = createStackNavigator()

function AppStack() {
  return (
    <Stack.Navigator
      screenOptions={{
        headerShown: false,
      }}
    >
      <Stack.Screen name='Home' component={Home} />
    </Stack.Navigator>
  )
}

export default AppStack
