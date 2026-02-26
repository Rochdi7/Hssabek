"use client";

import React, { useEffect, useState } from "react"; 

const SalesByCategoryProducts = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [35000, 25000, 18000];

  const options = {
    labels: ["Electronics", "Clothing", "Home Goods"],
    colors: ["#AD63F6", "#37D80A", "#3584FC"],
    plotOptions: {
      pie: {
        startAngle: -90,
        endAngle: 90,
        offsetY: 10,
      },
    },
    grid: {
      padding: {
        bottom: -80,
      },
    },
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            width: 200,
          },
          legend: {
            position: "bottom",
          },
        },
      },
    ],
    legend: {
      show: false,
    },
    dataLabels: {
      enabled: false,
    },
    tooltip: {
      enabled: true,
      y: {
        formatter: (val) => {
          return "$" + val / 1 + "";
        },
      },
    },
    stroke: {
      width: 2,
      show: true,
      colors: ["#ffffff"],
      lineCap: "round",
    },
  };

  return (
    <>
      <div style={{ margin: "-19px -15px -8px -23px" }}>
        {Chart && (
          <Chart options={options} series={series} type="donut" height={178} />
        )}
      </div>
    </>
  );
};

export default SalesByCategoryProducts;
