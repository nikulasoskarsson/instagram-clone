import React from 'react'
import { createStackNavigator } from '@react-navigation/stack'
import Login from '../modules/login'
import Signup from '../modules/signup'

const Stack = createStackNavigator()

function AuthStack() {
  return (
    <Stack.Navigator
      screenOptions={{
        headerShown: false,
      }}
    >
      <Stack.Screen name='Login' component={Login} />
      <Stack.Screen name='Signup' component={Signup} />
    </Stack.Navigator>
  )
}

export default AuthStack
