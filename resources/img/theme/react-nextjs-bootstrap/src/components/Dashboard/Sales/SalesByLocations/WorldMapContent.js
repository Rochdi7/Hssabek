"use client";

import WorldMap from "react-svg-worldmap";

const WorldMapContent = () => {
  const data = [
    { country: "us", value: 331883986 }, // United States
    { country: "de", value: 83129285 },  // Germany
    { country: "gb", value: 67886011 },  // United Kingdom
    { country: "ca", value: 37742154 },  // Canada
  ];

  return (
    <>
      <div className="text-center">
        <WorldMap 
          backgroundColor="transparent" 
          color="blue" 
          value-suffix="people" 
          size="sm" 
          data={data} 
        />
      </div>
    </>
  );
};

export default WorldMapContent;
