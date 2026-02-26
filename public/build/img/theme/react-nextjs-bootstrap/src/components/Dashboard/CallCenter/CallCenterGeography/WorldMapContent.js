"use client";

import WorldMap from "react-svg-worldmap";

const WorldMapContent = () => {
  const data = [
    { country: "us", value: 331883986 }, // United States
    { country: "ca", value: 37742154 }, // Canada
    { country: "br", value: 210301591 }, // Brazil
    { country: "ru", value: 141944641 }, // Russia
    { country: "de", value: 83129285 }, // Germany
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
