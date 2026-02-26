"use client";

import WorldMap from "react-svg-worldmap";

const WorldMapContent = () => {
  const data = [
    { country: "us", value: 331883986 }, // United States
    { country: "de", value: 83129285 }, // Germany
    { country: "gb", value: 68207114 }, // United Kingdom
    { country: "ca", value: 38005238 }, // Canada
    { country: "pt", value: 10196709 }, // Portugal
    { country: "es", value: 47351567 }, // Spain
    { country: "fr", value: 67391582 }, // France
    { country: "au", value: 25687041 }, // Australia
  ];

  return (
    <>
      <div className="text-center">
        <WorldMap
          backgroundColor="transparent"
          color="white"
          value-suffix="people"
          size="sm"
          data={data}
        />
      </div>
    </>
  );
};

export default WorldMapContent;
