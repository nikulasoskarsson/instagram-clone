import React from 'react'
import { View, Text, TouchableOpacity } from 'react-native'
import { useNavigation } from '@react-navigation/native'
import { inject } from 'mobx-react'

const user = {
  firstName: 'Nikulás',
  lastName: 'Óskarsson',
  email: 'nikulasoskarsson5@gmail.com',
  password: 'password',
  username: 'nikulasoskarsson5',
  dobMonth: 11,
  dobYear: 1995,
  dobDay: 19,
}

const index = ({ authStore }) => {
  const navigation = useNavigation()
  return (
    <View>
      <TouchableOpacity onPress={() => navigation.navigate('Login')}>
        <Text>Login in screen</Text>
      </TouchableOpacity>

      <TouchableOpacity onPress={() => authStore.createUser(user)}>
        <Text>Signup</Text>
      </TouchableOpacity>
    </View>
  )
}

export default inject('authStore')(index)
