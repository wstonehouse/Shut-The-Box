function get_username(cookie, name) {
    const nvs = cookie.split('; ');
  
    for (const nv of nvs) {
      const nv_split = nv.split('=');
  
      if (nv_split.length === 1) {
        if (name === '') {
          return nv;
        }
      }
      else if (nv_split[0] === name) {
        return nv.substr(name.length + 1);
      }
    }
    return '';
  }