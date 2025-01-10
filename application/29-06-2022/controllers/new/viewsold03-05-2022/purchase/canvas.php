<html>
   <head>
      <title>Page Title</title>
      <style type="text/css">
        @use postcss-preset-env;
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

:root {
    --ad-Color-prim: #111;
    --ad-Color-sec: #00E676;
    --ad-Color-del: #E53935;
}

html {
    font-size: 16px;
    font-family: "Open Sans", sans-serif;
}

html,
body {
    height: 100%;
}

.ad-App {
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* main layout */
.ad-Container {
    height: 100%;
    width: 100%;
    display: flex;
    background: #fff;
}
    .ad-Container-main {
        height: 100%;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
        .ad-Container-svg {
            height: 100%;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f3f3;
        }
    
    .ad-Container-controls {
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 20rem;
        background: var(--ad-Color-prim);
    }
    .ad-Container-controls ::-webkit-scrollbar {
        width: 6px;
    }
    .ad-Container-controls ::-webkit-scrollbar-thumb {
        border-radius: 30px;
        background: rgba(255, 255, 255, .3);
    }

.ad-Foot {
    padding: 1.5rem 2rem;
    display: flex;
    background: #fff;
    border-top: 2px solid #eee;
}
    .ad-Foot-list {
        flex: 1;
    }
        .ad-Foot-item {
            text-transform: uppercase;
            font-size: .7rem;
            color: var(--ad-Color-prim);
        }
        .ad-Foot-item + .ad-Foot-item {
            margin-top: .5rem;
        }
            .ad-Foot-highlight {
                padding-bottom: .04rem;
                border-bottom: 2px solid var(--ad-Color-sec);
                font-weight: bold;
            }
    
    .ad-Foot-meta {
        margin-left: 2rem;
        text-align: right;
        line-height: 1.4;
        font-size: .7rem;
        color: var(--ad-Color-prim);
    }
        .ad-Foot-meta a {
            text-decoration: underline;
            color: var(--ad-Color-prim);
        }


.ad-SVG {
    display: block;
    background: #fff;
    border-radius: 4px;
}
    .ad-Grid {
        fill: none;
        stroke: #eee;
        stroke-width: 1px;
    }
    .ad-Grid.is-hidden {
        opacity: 0;
    }
    .ad-Path {
        fill: none;
        stroke: #555;
        stroke-width: 4px;
        stroke-linecap: round;
    }
    .ad-Point {
        cursor: pointer;
        fill: #fff;
        stroke: #555;
        stroke-width: 5px;
        transition: fill .2s;
    }
    .ad-Point:hover,
    .ad-PointGroup.is-active .ad-Point {
        fill: var(--ad-Color-sec);
    }
    .ad-PointGroup--first .ad-Point {
        stroke: var(--ad-Color-sec);
    }
    .ad-Anchor {
        opacity: .5;
    }
    .ad-PointGroup.is-active .ad-Anchor {
        opacity: 1;
    }
        .ad-Anchor-point {
            cursor: pointer;
            fill: #fff;
            stroke: #888;
            stroke-width: 5px;
        }
        .ad-Anchor-line {
            stroke: #888;
            stroke-width: 1px;
            stroke-dasharray: 5 5;
        }

/* controls on the right */
.ad-Controls {
    overflow: auto;
    flex: 1;
    padding: 2rem;
}
    .ad-Controls :first-child {
        margin-top: 0;
    }
    .ad-Controls-title {
        margin: 3rem 0 1.5rem;
        font-size: .8rem;
        font-weight: bold;
        color: #fff;
    }
        .ad-Controls-container {
            display: flex;
        }
        .ad-Controls-container + .ad-Controls-container {
            margin-top: 1.5rem;
        }

.ad-Control {
    flex: 1;
}
    .ad-Control-label {
        display: block;
        margin-bottom: .5rem;
        text-transform: uppercase;
        font-size: .6rem;
        font-weight: bold;
        color: color(var(--ad-Color-prim) l(+75%));
    }

.ad-Result {
    height: 5rem;
    padding: 1.4rem 1.6rem;
    background: var(--ad-Color-prim);
    box-shadow: 0 -5px 10px rgba(0, 0, 0, .4);
}
    .ad-Result-textarea {
        height: 100%;
        width: 100%;
        resize: none;
        border: none;
        background: none;
        text-transform: uppercase;
        font-family: "Open Sans", sans-serif;
        font-size: .7rem;
        font-weight: bold;
        line-height: 1.8;
        color: #fff;
    }
    .ad-Result-textarea:focus {
        outline: 0;
    }

/* control elements */
.ad-Button {
    padding: .8rem 1.4rem;
    background: var(--ad-Color-sec);
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: background .2s;
    text-transform: uppercase;
    font-family: "Open Sans", sans-serif;
    font-weight: bold;
    font-size: .6rem;
    letter-spacing: .08rem;
    color: #fff;
}
.ad-Button:focus,
.ad-Button:hover {
    outline: 0;
    background: color(var(--ad-Color-sec) l(+5%));
}
.ad-Button--delete {
    background: var(--ad-Color-del);
}
.ad-Button--delete:focus,
.ad-Button--delete:hover {
    background: color(var(--ad-Color-del) l(+5%));
}
.ad-Button--reset {
    background: color(var(--ad-Color-prim) l(+10%));
}
.ad-Button--reset:focus,
.ad-Button--reset:hover {
    background: color(var(--ad-Color-prim) l(+15%));
}

.ad-Text {
    height: 18px;
    width: 2rem;
    background: color(var(--ad-Color-prim) l(+10%));
    border: none;
    border-radius: 4px;
    text-align: center;
    font-family: "Open Sans", sans-serif;
    font-size: .6rem;
    color: #fff;
}
.ad-Text:focus {
    outline: 0;
    background: color(var(--ad-Color-prim) l(+20%));
}

.ad-Checkbox-input {
    display: none;
}
.ad-Checkbox-fake {
    position: relative;
    height: 14px;
    width: 2rem;
    background: color(var(--ad-Color-prim) l(+10%));
    border-radius: 30px;
}
.ad-Checkbox-fake::after {
    content: "";
    box-sizing: border-box;
    display: block;
    position: absolute;
    top: -2px;
    left: 0;
    height: 18px;
    width: 18px;
    cursor: pointer;
    border: 4px solid #fff;
    background: color(var(--ad-Color-prim) l(+10%));
    border-radius: 50%;
}
.ad-Checkbox-input:checked + .ad-Checkbox-fake::after {
    left: auto;
    right: 0;
    border-color: var(--ad-Color-sec);
}

.ad-Choices {
    display: flex;
    width: 12rem;
}
    .ad-Choice {
        flex: 1;
    }
        .ad-Choice-input {
            display: none;
        }
        .ad-Choice-fake {
            padding: .6rem;
            background: color(var(--ad-Color-prim) l(+10%));
            border: 4px solid transparent;
            transition: border .2s;
            cursor: pointer;
            text-align: center;
            text-transform: uppercase;
            font-family: "Open Sans", sans-serif;
            font-size: .8rem;
            font-weight: bold;
            color: #fff;
        }
        .ad-Choice:first-child .ad-Choice-fake {
            border-radius: 4px 0 0 4px;
        }
        .ad-Choice:last-child .ad-Choice-fake {
            border-radius: 0 4px 4px 0;
        }
        .ad-Choice-input:checked + .ad-Choice-fake {
            border-color: var(--ad-Color-sec);
        }

.ad-Range {
    display: flex;
    align-items: center;
}
    .ad-Range-text {
        margin-left: .5rem;
    }
    .ad-Range-input {
        width: 100%;
        height: 14px;
        appearance: none;
        border-radius: 30px;
        background: color(var(--ad-Color-prim) l(+10%));
    }
    .ad-Range-input:focus {
        outline: 0;
        background: color(var(--ad-Color-prim) l(+20%));
    }
    /* thumb */
    .ad-Range-input::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        border: 4px solid #fff;
        background: color(var(--ad-Color-prim) l(+10%));
        border-radius: 50%;
        cursor: pointer;
        transition: border .2s;
    }
    .ad-Range-input::-moz-range-thumb {
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        border: 4px solid #fff;
        background: color(var(--ad-Color-prim) l(+10%));
        border-radius: 50%;
        cursor: pointer;
        transition: border .2s;
    }

    .ad-Range-input:hover::-webkit-slider-thumb,
    .ad-Range-input:focus::-webkit-slider-thumb {
        border-color: var(--ad-Color-sec);
    }
    .ad-Range-input:hover::-moz-range-thumb,
    .ad-Range-input:focus::-moz-range-thumb {
        border-color: var(--ad-Color-sec);
    }
      </style>

    </head>

    <body>
      <div id="app" class="ad-App">
        
      </div>

      
      <script type="text/babel" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.0/react.min.js"></script>
      <script type="text/babel" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.0/react-dom.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">
        const Component = React.Component
const render = ReactDOM.render

class Container extends Component {
    state = {
        w: 800,
        h: 600,
        grid: {
            show: true,
            snap: true,
            size: 50
        },
        ctrl: false,
        points: [
            { x: 100, y: 300 },
            { x: 200, y: 300, q: { x: 150, y: 50 } },
            { x: 300, y: 300, q: { x: 250, y: 550 } },
            { x: 400, y: 300, q: { x: 350, y: 50 } },
            { x: 500, y: 300, c: [{ x: 450, y: 550 }, { x: 450, y: 50 }] },
            { x: 600, y: 300, c: [{ x: 550, y: 50 }, { x: 550, y: 550 }] },
            { x: 700, y: 300, a: { rx: 50, ry: 50, rot: 0, laf: 1, sf: 1 } }
        ],
        activePoint: 2,
        draggedPoint: false,
        draggedQuadratic: false,
        draggedCubic: false,
        closePath: false
    };
    
    componentWillMount() {
        document.addEventListener("keydown", this.handleKeyDown, false)
        document.addEventListener("keyup", this.handleKeyUp, false)
    }
    
    componentWillUnmount() {
        document.removeEventListener("keydown")
        document.removeEventListener("keyup")
    }
    
    positiveNumber(n) {
        n = parseInt(n)
        if (isNaN(n) || n < 0) n = 0
        
        return n
    }
    
    setWidth = (e) => {
        let v = this.positiveNumber(e.target.value), min = 1
        if (v < min) v = min
        
        this.setState({ w: v })
    };
    
    setHeight = (e) => {
        let v = this.positiveNumber(e.target.value), min = 1
        if (v < min) v = min
        
        this.setState({ h: v })
    };

    setGridSize = (e) => {
        let grid = this.state.grid
        let v = this.positiveNumber(e.target.value)
        let min = 1
        let max = Math.min(this.state.w, this.state.h)
        
        if (v < min) v = min
        if (v >= max) v = max / 2
        
        grid.size = v
        
        this.setState({ grid })
    };
    
    setGridSnap = (e) => {
        let grid = this.state.grid
        grid.snap = e.target.checked
        
        this.setState({ grid })
    };
    
    setGridShow = (e) => {
        let grid = this.state.grid
        grid.show = e.target.checked
        
        this.setState({ grid })
    };

    setClosePath = (e) => {
        this.setState({ closePath: e.target.checked })
    };
    
    getMouseCoords = (e) => {
        const rect = ReactDOM.findDOMNode(this.refs.svg).getBoundingClientRect()
        let x = Math.round(e.pageX - rect.left)
        let y = Math.round(e.pageY - rect.top)

        if (this.state.grid.snap) {
            x = this.state.grid.size * Math.round(x / this.state.grid.size)
            y = this.state.grid.size * Math.round(y / this.state.grid.size)
        }
        
        return { x, y }
    };
    
    setPointType = (e) => {
        const points = this.state.points
        const active = this.state.activePoint
        
        // not the first point
        if (active !== 0) {
            let v = e.target.value
        
            switch (v) {
                case "l":
                    points[active] = {
                        x: points[active].x,
                        y: points[active].y
                    }
                break
                case "q":
                    points[active] = {
                        x: points[active].x,
                        y: points[active].y,
                        q: {
                            x: (points[active].x + points[active - 1].x) / 2,
                            y: (points[active].y + points[active - 1].y) / 2
                        }
                    }
                break
                case "c":
                    points[active] = {
                        x: points[active].x,
                        y: points[active].y,
                        c: [
                            {
                                x: (points[active].x + points[active - 1].x - 50) / 2,
                                y: (points[active].y + points[active - 1].y) / 2
                            },
                            {
                                x: (points[active].x + points[active - 1].x + 50) / 2,
                                y: (points[active].y + points[active - 1].y) / 2
                            }
                        ]
                    }
                break
                case "a":
                    points[active] = {
                        x: points[active].x,
                        y: points[active].y,
                        a: {
                            rx: 50,
                            ry: 50,
                            rot: 0,
                            laf: 1,
                            sf: 1
                        }
                    }
                break
            }

            this.setState({ points })
        }
    };
    
    setPointPosition = (coord, e) => {
        let coords = this.state.points[this.state.activePoint]
        let v = this.positiveNumber(e.target.value)

        if (coord === "x" && v > this.state.w) v = this.state.w
        if (coord === "y" && v > this.state.h) v = this.state.h
        
        coords[coord] = v

        this.setPointCoords(coords)
    };
    
    setQuadraticPosition = (coord, e) => {
        let coords = this.state.points[this.state.activePoint].q
        let v = this.positiveNumber(e.target.value)

        if (coord === "x" && v > this.state.w) v = this.state.w
        if (coord === "y" && v > this.state.h) v = this.state.h

        coords[coord] = v

        this.setQuadraticCoords(coords)
    };
    
    setCubicPosition = (coord, anchor, e) => {
        let coords = this.state.points[this.state.activePoint].c[anchor]
        let v = this.positiveNumber(e.target.value)

        if (coord === "x" && v > this.state.w) v = this.state.w
        if (coord === "y" && v > this.state.h) v = this.state.h

        coords[coord] = v

        this.setCubicCoords(coords, anchor)
    };
    
    setPointCoords = (coords) => {
        const points = this.state.points
        const active = this.state.activePoint

        points[active].x = coords.x
        points[active].y = coords.y
        
        this.setState({ points })
    };
    
    setQuadraticCoords = (coords) => {
        const points = this.state.points
        const active = this.state.activePoint
        
        points[active].q.x = coords.x
        points[active].q.y = coords.y
        
        this.setState({ points })
    };
    
    setArcParam = (param, e) => {
        const points = this.state.points
        const active = this.state.activePoint
        let v
        
        if (["laf", "sf"].indexOf(param) > -1) {
            v = e.target.checked ? 1 : 0
        } else {
            v = this.positiveNumber(e.target.value)
        }
        
        points[active].a[param] = v
        
        this.setState({ points })
    };
    
    setCubicCoords = (coords, anchor) => {
        const points = this.state.points
        const active = this.state.activePoint
        
        points[active].c[anchor].x = coords.x
        points[active].c[anchor].y = coords.y
        
        this.setState({ points })
    };
    
    setDraggedPoint = (index) => {
        if ( ! this.state.ctrl) {
            this.setState({
                activePoint: index,
                draggedPoint: true
            })
        }
    };

    setDraggedQuadratic = (index) => {
        if ( ! this.state.ctrl) {
            this.setState({
                activePoint: index,
                draggedQuadratic: true
            })
        }
    };

    setDraggedCubic = (index, anchor) => {
        if ( ! this.state.ctrl) {
            this.setState({
                activePoint: index,
                draggedCubic: anchor
            })
        }
    };
    
    cancelDragging = (e) => {
        this.setState({
            draggedPoint: false,
            draggedQuadratic: false,
            draggedCubic: false
        })
    };
    
    addPoint = (e) => {
        if (this.state.ctrl) {
            let coords = this.getMouseCoords(e)
            let points = this.state.points

            points.push(coords)

            this.setState({
                points,
                activePoint: points.length - 1
            })
        }
    };
    
    removeActivePoint = (e) => {
        let points = this.state.points
        let active = this.state.activePoint
        
        if (points.length > 1 && active !== 0) {
            points.splice(active, 1)

            this.setState({
                points,
                activePoint: points.length - 1
            })
        }
    };
    
    handleMouseMove = (e) => {
        if ( ! this.state.ctrl) {
            if (this.state.draggedPoint) {
                this.setPointCoords(this.getMouseCoords(e))
            } else if (this.state.draggedQuadratic) {
                this.setQuadraticCoords(this.getMouseCoords(e))
            } else if (this.state.draggedCubic !== false) {
                this.setCubicCoords(this.getMouseCoords(e), this.state.draggedCubic)
            }
        }
    };
    
    handleKeyDown = (e) => {
        if (e.ctrlKey) this.setState({ ctrl: true })
    };
    
    handleKeyUp = (e) => {
        if ( ! e.ctrlKey) this.setState({ ctrl: false })
    };
    
    generatePath() {
        let { points, closePath } = this.state
        let d = ""
        
        points.forEach((p, i) => {
            if (i === 0) {
                // first point
                d += "M "
            } else if (p.q) {
                // quadratic
                d += `Q ${ p.q.x } ${ p.q.y } `
            } else if (p.c) {
                // cubic
                d += `C ${ p.c[0].x } ${ p.c[0].y } ${ p.c[1].x } ${ p.c[1].y } `
            } else if (p.a) {
                // arc
                d += `A ${ p.a.rx } ${ p.a.ry } ${ p.a.rot } ${ p.a.laf } ${ p.a.sf } `
            } else {
                d += "L "
            }

            d += `${ p.x } ${ p.y } `
        })
        
        if (closePath) d += "Z"
        
        return d
    }

    reset = (e) => {
        let w = this.state.w, h = this.state.h
        
        this.setState({
            points: [{ x: w / 2, y: h / 2 }],
            activePoint: 0
        })
    };
    
    
}

function Foot(props) {
    
}

function Result(props) {
    return (
        '<div className="ad-Result">
            <textarea
                className="ad-Result-textarea"
                value={ props.path }
                onFocus={ (e) => e.target.select() } />
        </div>'
    )
}

/**
 * SVG rendering
 */

class SVG extends Component {
    render() {
        const {
            path,
            w,
            h,
            grid,
            points,
            activePoint,
            addPoint,
            handleMouseMove,
            setDraggedPoint,
            setDraggedQuadratic,
            setDraggedCubic
        } = this.props

        let circles = points.map((p, i, a) => {
            let anchors = []
            
            if (p.q) {
                anchors.push(
                    <Quadratic
                        index={ i }
                        p1x={ a[i - 1].x }
                        p1y={ a[i - 1].y }
                        p2x={ p.x }
                        p2y={ p.y }
                        x={ p.q.x }
                        y={ p.q.y }
                        setDraggedQuadratic={ setDraggedQuadratic } />
                )
            } else if (p.c) {
                anchors.push(
                    <Cubic
                        index={ i }
                        p1x={ a[i - 1].x }
                        p1y={ a[i - 1].y }
                        p2x={ p.x }
                        p2y={ p.y }
                        x1={ p.c[0].x }
                        y1={ p.c[0].y }
                        x2={ p.c[1].x }
                        y2={ p.c[1].y }
                        setDraggedCubic={ setDraggedCubic } />
                )
            }
            
            return (
                <g className={
                    "ad-PointGroup" +
                    (i === 0 ? "  ad-PointGroup--first" : "") +
                    (activePoint === i ? "  is-active" : "")
                }>
                    <Point
                        index={ i }
                        x={ p.x }
                        y={ p.y }
                        setDraggedPoint={ setDraggedPoint } />
                    { anchors }
                </g>
            )
        })

        return (
            <svg
                className="ad-SVG"
                width={ w }
                height={ h }
                onClick={ (e) => addPoint(e) }
                onMouseMove={ (e) => handleMouseMove(e) }>
                <Grid
                    w={ w }
                    h={ h }
                    grid={ grid } />
                <path
                    className="ad-Path"
                    d={ path } />
                <g className="ad-Points">
                    { circles }
                </g>
            </svg>
        )
    }
}

function Cubic(props) {
    return (
        <g className="ad-Anchor">
            <line
                className="ad-Anchor-line"
                x1={ props.p1x }
                y1={ props.p1y }
                x2={ props.x1 }
                y2={ props.y1 } />
            <line
                className="ad-Anchor-line"
                x1={ props.p2x }
                y1={ props.p2y }
                x2={ props.x2 }
                y2={ props.y2 } />
            <circle
                className="ad-Anchor-point"
                onMouseDown={ (e) => props.setDraggedCubic(props.index, 0) }
                cx={ props.x1 }
                cy={ props.y1 }
                r={ 6 } />
            <circle
                className="ad-Anchor-point"
                onMouseDown={ (e) => props.setDraggedCubic(props.index, 1) }
                cx={ props.x2 }
                cy={ props.y2 }
                r={ 6 } />
        </g>
    )
}

function Quadratic(props) {
    return (
        <g className="ad-Anchor">
            <line
                className="ad-Anchor-line"
                x1={ props.p1x }
                y1={ props.p1y }
                x2={ props.x }
                y2={ props.y } />
            <line
                className="ad-Anchor-line"
                x1={ props.x }
                y1={ props.y }
                x2={ props.p2x }
                y2={ props.p2y } />
            <circle
                className="ad-Anchor-point"
                onMouseDown={ (e) => props.setDraggedQuadratic(props.index) }
                cx={ props.x }
                cy={ props.y }
                r={ 6 } />
        </g>
    )
}

function Point(props) {
    return (
        <circle
            className="ad-Point"
            onMouseDown={ (e) => props.setDraggedPoint(props.index) }
            cx={ props.x }
            cy={ props.y }
            r={ 8 } />
    )
}
            
function Grid(props) {
    const { show, snap, size } = props.grid
    
    let grid = []
    
    for (let i = 1 ; i < (props.w / size) ; i++) {
        grid.push(
            <line
                x1={ i * size }
                y1={ 0 }
                x2={ i * size }
                y2={ props.h } />
        )
    }

    for (let i = 1 ; i < (props.h / size) ; i++) {
        grid.push(
            <line
                x1={ 0 }
                y1={ i * size }
                x2={ props.w }
                y2={ i * size } />
        )
    }
    
    return (
        <g className={
            "ad-Grid" +
            ( ! show ? "  is-hidden" : "")
        }>
            { grid }
        </g>
    )
}

/**
 * Controls
 */

function Controls(props) {
    const active = props.points[props.activePoint]
    const step = props.grid.snap ? props.grid.size : 1
    
    let params = []
    
    if (active.q) {
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="Control point X position"
                    type="range"
                    min={ 0 }
                    max={ props.w }
                    step={ step }
                    value={ active.q.x }
                    onChange={ (e) => props.setQuadraticPosition("x", e) } />
            </div>
        )
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="Control point Y position"
                    type="range"
                    min={ 0 }
                    max={ props.h }
                    step={ step }
                    value={ active.q.y }
                    onChange={ (e) => props.setQuadraticPosition("y", e) } />
            </div>
        )
    } else if (active.c) {
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="First control point X position"
                    type="range"
                    min={ 0 }
                    max={ props.w }
                    step={ step }
                    value={ active.c[0].x }
                    onChange={ (e) => props.setCubicPosition("x", 0, e) } />
            </div>
        )
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="First control point Y position"
                    type="range"
                    min={ 0 }
                    max={ props.h }
                    step={ step }
                    value={ active.c[0].y }
                    onChange={ (e) => props.setCubicPosition("y", 0, e) } />
            </div>
        )
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="Second control point X position"
                    type="range"
                    min={ 0 }
                    max={ props.w }
                    step={ step }
                    value={ active.c[1].x }
                    onChange={ (e) => props.setCubicPosition("x", 1, e) } />
            </div>
        )
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="Second control point Y position"
                    type="range"
                    min={ 0 }
                    max={ props.h }
                    step={ step }
                    value={ active.c[1].y }
                    onChange={ (e) => props.setCubicPosition("y", 1, e) } />
            </div>
        )
    } else if (active.a) {
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="X Radius"
                    type="range"
                    min={ 0 }
                    max={ props.w }
                    step={ step }
                    value={ active.a.rx }
                    onChange={ (e) => props.setArcParam("rx", e) } />
            </div>
        )
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="Y Radius"
                    type="range"
                    min={ 0 }
                    max={ props.h }
                    step={ step }
                    value={ active.a.ry }
                    onChange={ (e) => props.setArcParam("ry", e) } />
            </div>
        )
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="Rotation"
                    type="range"
                    min={ 0 }
                    max={ 360 }
                    step={ 1 }
                    value={ active.a.rot }
                    onChange={ (e) => props.setArcParam("rot", e) } />
            </div>
        )
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="Large arc sweep flag"
                    type="checkbox"
                    checked={ active.a.laf }
                    onChange={ (e) => props.setArcParam("laf", e) } />
            </div>
        )
        params.push(
            <div className="ad-Controls-container">
                <Control
                    name="Sweep flag"
                    type="checkbox"
                    checked={ active.a.sf }
                    onChange={ (e) => props.setArcParam("sf", e) } />
            </div>
        )
    }
        
    return (
        <div className="ad-Controls">
            <h3 className="ad-Controls-title">
                Parameters
            </h3>
            
            <div className="ad-Controls-container">
                <Control
                    name="Width"
                    type="text"
                    value={ props.w }
                    onChange={ (e) => props.setWidth(e) } />
                <Control
                    name="Height"
                    type="text"
                    value={ props.h }
                    onChange={ (e) => props.setHeight(e) } />
                <Control
                    name="Close path"
                    type="checkbox"
                    value={ props.closePath }
                    onChange={ (e) => props.setClosePath(e) } />
            </div>
            <div className="ad-Controls-container">
                <Control
                    name="Grid size"
                    type="text"
                    value={ props.grid.size }
                    onChange={ (e) => props.setGridSize(e) } />
                <Control
                    name="Snap grid"
                    type="checkbox"
                    checked={ props.grid.snap }
                    onChange={ (e) => props.setGridSnap(e) } />
                <Control
                    name="Show grid"
                    type="checkbox"
                    checked={ props.grid.show }
                    onChange={ (e) => props.setGridShow(e) } />
            </div>
            <div className="ad-Controls-container">
                <Control
                    type="button"
                    action="reset"
                    value="Reset path"
                    onClick={ (e) => props.reset(e) } />
            </div>
                    
            <h3 className="ad-Controls-title">
                Selected point
            </h3>
            
            { props.activePoint !== 0 && (
                <div className="ad-Controls-container">
                    <Control
                        name="Point type"
                        type="choices"
                        id="pointType"
                        choices={[
                            { name: "L", value: "l", checked: (!active.q && !active.c && !active.a) },
                            { name: "Q", value: "q", checked: !!active.q },
                            { name: "C", value: "c", checked: !!active.c },
                            { name: "A", value: "a", checked: !!active.a }
                        ]}
                        onChange={ (e) => props.setPointType(e) } />
                </div>
            )}
            <div className="ad-Controls-container">
                <Control
                    name="Point X position"
                    type="range"
                    min={ 0 }
                    max={ props.w }
                    step={ step }
                    value={ active.x }
                    onChange={ (e) => props.setPointPosition("x", e) } />
            </div>
            <div className="ad-Controls-container">
                <Control
                    name="Point Y position"
                    type="range"
                    min={ 0 }
                    max={ props.h }
                    step={ step }
                    value={ active.y }
                    onChange={ (e) => props.setPointPosition("y", e) } />
            </div>
            
            { params }
            
            { props.activePoint !== 0 && (
                <div className="ad-Controls-container">
                    <Control
                        type="button"
                        action="delete"
                        value="Remove this point"
                        onClick={ (e) => props.removeActivePoint(e) } />
                </div>
            )}
        </div>
    )
}

function Control(props) {
    const {
        name,
        type,
        ..._props
    } = props

    let control = "", label = ""

    switch (type) {
        case "range": control = <Range { ..._props } />
        break
        case "text": control = <Text { ..._props } />
        break
        case "checkbox": control = <Checkbox { ..._props } />
        break
        case "button": control = <Button { ..._props } />
        break
        case "choices": control = <Choices { ..._props } />
        break
    }

    if (name) {
        label = (
            <label className="ad-Control-label">
                { name }
            </label>
        )
    }

    return (
        <div className="ad-Control">
            { label }
            { control }
        </div>
    )
}

function Choices(props) {
    let choices = props.choices.map((c, i) => {
        return (
            <label className="ad-Choice">
                <input
                    className="ad-Choice-input"
                    type="radio"
                    value={ c.value }
                    checked={ c.checked }
                    name={ props.id }
                    onChange={ props.onChange } />
                <div className="ad-Choice-fake">
                    { c.name }
                </div>
            </label>
        )
    })
    
    return (
        <div className="ad-Choices">
            { choices }
        </div>
    )
}

function Button(props) {    
    return (
        <button
            className={
                "ad-Button" +
                (props.action ? "  ad-Button--" + props.action : "")
            }
            type="button"
            onClick={ props.onClick }>
            { props.value }
        </button>
    )
}

function Checkbox(props) {    
    return (
        <label className="ad-Checkbox">
            <input
                className="ad-Checkbox-input"
                type="checkbox"
                onChange={ props.onChange }
                checked={ props.checked } />
            <div className="ad-Checkbox-fake" />
        </label>
    )
}

function Text(props) {
    return (
        <input
            className="ad-Text"
            type="text"
            value={ props.value }
            onChange={ props.onChange } />
    )
}

function Range(props) {    
    return (
        <div className="ad-Range">
            <input
                className="ad-Range-input"
                type="range"
                min={ props.min }
                max={ props.max }
                step={ props.step }
                value={ props.value }
                onChange={ props.onChange } />
            <input
                className="ad-Range-text  ad-Text"
                type="text"
                value={ props.value }
                onChange={ props.onChange } />
        </div>
    )
}

render(
    <Container />,
    document.querySelector("#app")
)
      </script>

   </body>
</html>