
export const Utils = {
    
    addClass(cs, c)
    {
        if(!cs) return cs;
        
        let _cs = (typeof cs === 'string') ? cs.split(' ') : cs;
        
        const ci = _cs.indexOf(c);
        
        if(ci < 0) _cs.push(c);
        
        return _cs.join(' ');
    },
    
    removeClass(cs, c)
    {
        if(!cs) return cs;
        
        let _cs = (typeof cs === 'string') ? cs.split(' ') : cs;
        
        const ci = _cs.indexOf(c);
        
        if(ci > -1) _cs.splice(ci, 1);
        
        return _cs.join(' ');
    }
    
}