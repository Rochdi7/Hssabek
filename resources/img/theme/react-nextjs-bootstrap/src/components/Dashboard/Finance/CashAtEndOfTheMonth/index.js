"use client";

import React, { useEffect } from "react";
import * as echarts from "echarts";
import { Card } from "react-bootstrap";

const CashAtEndOfTheMonth = () => {
  useEffect(() => {
    const chartDom = document.getElementById("cash_at_end_of_the_month");
    if (chartDom) {
      const myChart = echarts.init(chartDom);

      const option = {
        tooltip: {
          trigger: "item",
        },
        legend: {
          bottom: "0",
          left: "center",
          itemWidth: 10,
          itemHeight: 10,
          textStyle: {
            fontSize: 12,
            color: "#64748B", // Adjust this for theme consistency
          },
        },
        color: ["#37D80A", "#FD5812", "#605DFF"],
        series: [
          {
            name: "Cash at End of the Month",
            type: "pie",
            radius: ["40%", "70%"],
            center: ["50%", "70%"],
            startAngle: 180,
            endAngle: 360,
            data: [
              { value: 1048, name: "42.9%" },
              { value: 735, name: "20.0%" },
              { value: 580, name: "37.1%" },
            ],
          },
        ],
      };

      myChart.setOption(option);

      // Cleanup to dispose of the chart on unmount
      return () => {
        myChart.dispose();
      };
    }
  }, []);

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <Card.Body className="p-4">
          <span className="d-block mb-3">Cash at End of the Month</span>

          <div style={{ margin: "-37px 0 -5px 0" }}>
            <div
              id="cash_at_end_of_the_month"
              style={{ width: "100%", height: "165px" }}
            />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default CashAtEndOfTheMonth;
